<?php
include "checklogin.php";
include "header.php";
include "../employee/connection.php";
 ?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="#" title="Current page" class="tip-bottom"><i class="fas fa-box-open"></i>
          Products</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
          <div class="span12">
            <div class="widget-box">

              <div class="widget-title"> <span class="icon"> <i class="fas fa-plus"></i> </span>
                <h5>Add New Product</h5>
              </div>

              <div class="widget-content nopadding">

                <form name = "AddProduct" action="" method="post" class="form-horizontal">

                  <div class="control-group">
                    <label class="control-label">Select Company :</label>
                    <div class="controls">
                      <select class="span11"  name = "companyname">
                        <?php
                            $res = mysqli_query($link,"select * from prod_company");
                            while($row = mysqli_fetch_array($res))
                            {
                              echo "<option>";
                              echo $row["company_name"];
                              echo "</option>";
                            }
                         ?>
                      </select>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">Product Name :</label>
                    <div class="controls">
                      <input type="text" class="span11" placeholder="Product name" name ="productname" />
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">Packing size :</label>
                    <div class="controls">
                      <input type="text" class="span11" placeholder="Packing Size" name ="packingsize" />
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">Select unit :</label>
                    <div class="controls">
                      <select class="span11" name = "unit">
                        <?php
                            $res = mysqli_query($link,"select * from units");
                            while($row = mysqli_fetch_array($res))
                            {
                              echo "<option>";
                              echo $row["unit"];
                              echo "</option>";
                            }
                         ?>
                      </select>
                    </div>
                  </div>


                  <div class="alert alert-danger" role="alert" id = "error" style="display:none">
                      This Product already exists.Please Enter Different Product
                  </div>

                  <div class="form-actions">
                    <button type="submit" name = "submitProduct" class="btn btn-success">Save</button>
                  </div>

                  <div class="alert alert-success" role="alert" id = "success" style="display:none">
                      Record Inserted Succesfully
                  </div>
                </form>
              </div>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Company Name</th>
                    <th>Product Name</th>
                    <th>Packing Size</th>
                    <th>Unit</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $res = mysqli_query($link,"select * from products");
                  while($row=mysqli_fetch_array($res))
                  {
                      ?>

                      <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["company_name"] ?></td>
                          <td><?php echo $row["product_name"] ?></td>
                            <td><?php echo $row["packing_size"] ?></td>
                              <td><?php echo $row["unit"] ?></td>
                        <td><center><a href="edit_product.php?id=<?php echo $row["id"]; ?>" style="color:#11C2A3"> Edit </a></center></td>
                        <td><center><a href="delete_product.php?id=<?php echo $row["id"]; ?>" style="color:#9C0F00"> Delete </a></center></td>
                      </tr>

                      <?php
                  }

                   ?>

                </tbody>
              </table>
            </div>
        </div>

    </div>
</div>

<?php

if(isset($_POST["submitProduct"]))
{
  $count =0;
  $res = mysqli_query($link,"select * from products where company_name='$_POST[companyname]' && product_name ='$_POST[productname]' && packing_size='$_POST[packingsize]' && unit ='$_POST[unit]'") or die(mysqli_error($link));
  $count = mysqli_num_rows($res);

  if($count>0)
  {
    ?>
    <script type="text/javascript">
    document.getElementById("success").style.display="none";
    document.getElementById("error").style.display="block";
    </script>
    <?php
  }
  else
  {
    mysqli_query($link,"insert into products values (NULL,'$_POST[companyname]','$_POST[productname]','$_POST[packingsize]','$_POST[unit]')") or die(mysqli_error($link));
    ?>
    <script type="text/javascript">
    document.getElementById("success").style.display="block";
    document.getElementById("error").style.display="none";
    setTimeout(function(){
      window.location.href =   window.location.href;
    },1000)
    </script>
    <?php
  }
}

?>

<!--end-main-container-part-->

<?php
include "footer.php";
 ?>
