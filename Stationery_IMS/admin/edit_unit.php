<?php
include "checklogin.php";
include "header.php";
include "../employee/connection.php";
$id = $_GET["id"];
$unit="";
$res = mysqli_query($link, "select * from units where id = $id");
while($row=mysqli_fetch_array($res))
{
  $unit=$row["unit"];
}
 ?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
          <a href="add_unit.php" title="Add and View Units" class="tip-bottom"><i class="fas fa-ruler"></i>Edit Units</a>
          <a href="#" title="Current page" class="tip-bottom"></i>Edit Units</a>
        </div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
          <div class="span12">
            <div class="widget-box">

              <div class="widget-title"> <span class="icon"> <i class="fas fa-edit"></i></i> </span>
                <h5>Edit Unit info</h5>
              </div>

              <div class="widget-content nopadding">

                <form name = "EditEmployee" action="" method="post" class="form-horizontal">
                  <div class="control-group">
                    <label class="control-label">Unit Name :</label>
                    <div class="controls">
                      <input type="text" class="span11" placeholder="unit name" name ="unitname" value = "<?php echo $unit; ?>" />
                    </div>
                  </div>

                  <div class="form-actions">
                    <button type="submit" name = "submitUnit" class="btn btn-success">Update</button>
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
if(isset($_POST["submitUnit"]))
{
  mysqli_query($link,"update units set unit ='$_POST[unitname]' where id = $id") or die(mysqli_error($link));
?>
  <script type="text/javascript">
  document.getElementById("success").style.display="block";
  setTimeout(function(){
    window.location.href ="add_unit.php";
  },1500)
  </script>
  <?php
}
?>

<!--end-main-container-part-->

<?php
include "footer.php";
 ?>
