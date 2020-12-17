<?php
include "checklogin.php";
include "header.php";
include "../employee/connection.php";
 ?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="#" title="Current page" class="tip-bottom"><i class="fas fa-truck"></i>
            Suppliers</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
          <div class="span12">
            <div class="widget-box">

              <div class="widget-title"> <span class="icon"><i class="fas fa-plus"></i></span>
                <h5>Add New Supplier</h5>
              </div>

              <div class="widget-content nopadding">

                <form name = "AddSupplier" action="" method="post" class="form-horizontal">
                  <div class="control-group">
                    <label class="control-label">Name :</label>
                    <div class="controls">
                      <input type="text" class="span11" placeholder="Name" name ="name" />
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">Contact :</label>
                    <div class="controls">
                      <input type="text" class="span11" placeholder="Contact" name = "contact" />
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">Address :</label>
                    <div class="controls">
                      <textarea class="span11" placeholder="Address" name = "address"></textarea>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">City</label>
                    <div class="controls">
                      <input type="text"  class="span11" placeholder="Enter City" name ="city" />
                    </div>
                  </div>

                  <div class="form-actions">
                    <button type="submit" name = "submitEmployee" class="btn btn-success">Save</button>
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
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $res = mysqli_query($link,"select * from suppliers");
                  while($row=mysqli_fetch_array($res))
                  {
                      ?>

                      <tr>
                        <td><?php echo $row["name"] ?></td>
                        <td><?php echo $row["contact"] ?></td>
                        <td><?php echo $row["address"] ?></td>
                        <td><?php echo $row["city"] ?></td>
                        <td><a href="edit_supplier.php?id=<?php echo $row["id"]; ?>" style="color:#11C2A3"> Edit </a></td>
                        <td><a href="delete_supplier.php?id=<?php echo $row["id"]; ?>" style="color:#9C0F00"> Delete </a></td>
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

if(isset($_POST["submitEmployee"]))
{
    mysqli_query($link,"insert into suppliers values (NULL,'$_POST[name]','$_POST[contact]','$_POST[address]','$_POST[city]')") or die(mysqli_error($link));
    ?>
    <script type="text/javascript">
    document.getElementById("success").style.display="block";
    setTimeout(function(){
      window.location.href =   window.location.href;
    },1000)
    </script>
    <?php
}

?>

<!--end-main-container-part-->

<?php
include "footer.php";
 ?>
