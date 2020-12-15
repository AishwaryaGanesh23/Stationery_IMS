<?php
include "header.php";
include "../employee/connection.php";
$id = $_GET["id"];
$company="";
$res = mysqli_query($link, "select * from prod_company where id = $id");
while($row=mysqli_fetch_array($res))
{
  $company=$row["company_name"];
}
 ?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
          <a href="add_company.php" title="Add and View Companies" class="tip-bottom"><i class="fas fa-building"></i>Companies</a>
          <a href="#" title="Current page" class="tip-bottom">Edit Company</a>
        </div>

    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
          <div class="span12">
            <div class="widget-box">

              <div class="widget-title"> <span class="icon"> <i class="fas fa-edit"></i> </span>
                <h5>Edit Company info</h5>
              </div>

              <div class="widget-content nopadding">

                <form name = "EditEmployee" action="" method="post" class="form-horizontal">
                  <div class="control-group">
                    <label class="control-label">Company Name :</label>
                    <div class="controls">
                      <input type="text" class="span11" placeholder="Company name" name ="companyname" value = "<?php echo $company; ?>" />
                    </div>
                  </div>

                  <div class="form-actions">
                    <button type="submit" name = "submitCompany" class="btn btn-success">Update</button>
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
if(isset($_POST["submitCompany"]))
{
  mysqli_query($link,"update prod_company set company_name ='$_POST[companyname]' where id = $id") or die(mysqli_error($link));
?>
  <script type="text/javascript">
  document.getElementById("success").style.display="block";
  setTimeout(function(){
    window.location.href ="add_company.php";
  },1500)
  </script>
  <?php
}
?>

<!--end-main-container-part-->

<?php
include "footer.php";
 ?>
