<?php
include "header.php";
include "../employee/connection.php";
$id = $_GET["id"];
$companyname="";
$productname="";
$packingsize="";
$unit="";

$res = mysqli_query($link, "select * from products where id = $id");
while($row=mysqli_fetch_array($res))
{
  $companyname=$row["company_name"];
  $productname=$row["product_name"];
  $packingsize=$row["packing_size"];
  $unit=$row["unit"];
}
 ?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
          <a href="add_product.php" title="Add and View Products" class="tip-bottom"><i class="fas fa-box-open"></i>Products</a>
          <a href="#" title="Current page" class="tip-bottom">Edit Product</a>
        </div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
          <div class="span12">
            <div class="widget-box">

              <div class="widget-title"> <span class="icon"><i class="fas fa-edit"></i>  </span>
                <h5>Edit Product Info</h5>
              </div>

              <div class="widget-content nopadding">

                <form name = "EditProduct" action="" method="post" class="form-horizontal">

                  <div class="control-group">
                    <label class="control-label">Select Company :</label>
                    <div class="controls">
                      <select class="span11"  name = "companyname">
                        <?php
                            $res = mysqli_query($link,"select * from prod_company");
                            while($row = mysqli_fetch_array($res))
                            {
                              ?>
                              <option <?php if($row["company_name"] == $companyname) {echo "selected";} ?> >
                                <?php
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
                      <input type="text" class="span11" placeholder="Product name" name ="productname" value = "<?php echo $productname; ?>" />
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">Packing size :</label>
                    <div class="controls">
                      <input type="text" class="span11" placeholder="Packing Size" name ="packingsize" value = "<?php echo $packingsize; ?>"/>
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
                              ?>
                              <option <?php if($row["unit"] == $unit) {echo "selected";} ?>>
                                <?php
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
                    <button type="submit" name = "EditProduct" class="btn btn-success">Save</button>
                  </div>

                  <div class="alert alert-success" role="alert" id = "success" style="display:none">
                      Record Updated Succesfully
                  </div>
                </form>
              </div>
            </div>
        </div>

    </div>
</div>

<?php

if(isset($_POST["EditProduct"]))
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
    mysqli_query($link,"update products set company_name='$_POST[companyname]',product_name='$_POST[productname]', packing_size='$_POST[packingsize]', unit ='$_POST[unit]' where id = $id")or die(mysqli_error($link));
    ?>
    <script type="text/javascript">
    document.getElementById("success").style.display="block";
    document.getElementById("error").style.display="none";
    setTimeout(function(){
      window.location.href = "add_product.php";
    },1500)
    </script>
    <?php
  }
}

?>

<!--end-main-container-part-->

<?php
include "footer.php";
 ?>
