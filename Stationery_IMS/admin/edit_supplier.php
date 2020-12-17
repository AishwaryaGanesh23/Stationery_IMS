<?php
include "checklogin.php";
include "header.php";
include "../employee/connection.php";
$id = $_GET["id"];
$name="";
$contact="";
$address="";
$city="";
$res = mysqli_query($link, "select * from suppliers where id = $id");
while($row=mysqli_fetch_array($res))
{
  $name=$row["name"];
  $contact=$row["contact"];
  $address=$row["address"];
  $city=$row["city"];
}
 ?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
          <a href="add_supplier.php" title="Add and View Suppliers" class="tip-bottom"><i class="fas fa-truck"></i>Suppliers</a>
          <a href="#" title="Current page" class="tip-bottom"></i>Edit Suppliers</a>
        </div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
          <div class="span12">
            <div class="widget-box">

              <div class="widget-title"> <span class="icon"> <i class="fas fa-edit"></i> </span>
                <h5>Edit Supplier Info</h5>
              </div>

              <div class="widget-content nopadding">

                <form name = "AddSupplier" action="" method="post" class="form-horizontal">
                  <div class="control-group">
                    <label class="control-label">Name :</label>
                    <div class="controls">
                      <input type="text" class="span11" placeholder="Name" name ="name" value = "<?php echo $name; ?>"/>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">Contact :</label>
                    <div class="controls">
                      <input type="text" class="span11" placeholder="Contact" name = "contact" value = "<?php echo $contact; ?>"/>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">Address :</label>
                    <div class="controls">
                      <textarea class="span11" placeholder="Address" name = "address"><?php echo $address; ?></textarea>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">City</label>
                    <div class="controls">
                      <input type="text"  class="span11" placeholder="Enter City" name ="city" value = "<?php echo $city; ?>"/>
                    </div>
                  </div>

                  <div class="form-actions">
                    <button type="submit" name = "submitSupplier" class="btn btn-success">Update</button>
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

if(isset($_POST["submitSupplier"]))
{
    mysqli_query($link,"update suppliers set  name ='$_POST[name]', contact ='$_POST[contact]', address='$_POST[address]', city ='$_POST[city]' where id = $id") or die(mysqli_error($link));
    ?>
    <script type="text/javascript">
    document.getElementById("success").style.display="block";
    setTimeout(function(){
      window.location.href ="add_supplier.php";
    },1500)
    </script>
    <?php
}

?>

<!--end-main-container-part-->

<?php
include "footer.php";
 ?>
