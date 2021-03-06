<?php
include "checklogin.php";
include "header.php";
include "../employee/connection.php";
 ?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="#" title="Current page" class="tip-bottom"><i class="fas fa-ruler"></i>
          Units</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
          <div class="span12">
            <div class="widget-box">

              <div class="widget-title"> <span class="icon"> <i class="fas fa-plus"></i> </span>
                <h5>Add New Unit</h5>
              </div>

              <div class="widget-content nopadding">

                <form name = "AddUnit" action="" method="post" class="form-horizontal">

                  <div class="control-group">
                    <label class="control-label">Unit Name :</label>
                    <div class="controls">
                      <input type="text" class="span11" placeholder="Unit name" name ="unitname" />
                    </div>
                  </div>



                  <div class="alert alert-danger" role="alert" id = "error" style="display:none">
                      This Unit already exists.
                  </div>

                  <div class="form-actions">
                    <button type="submit" name = "submitUnit" class="btn btn-success">Save</button>
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
                    <th>Unit Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $res = mysqli_query($link,"select * from units");
                  while($row=mysqli_fetch_array($res))
                  {
                      ?>

                      <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["unit"] ?></td>
                        <td><center><a href="edit_unit.php?id=<?php echo $row["id"]; ?>" style="color:#11C2A3"> Edit </a></center></td>
                        <td><center><a href="delete_unit.php?id=<?php echo $row["id"]; ?>" style="color:#9C0F00"> Delete </a></center></td>
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
</div>

<?php

if(isset($_POST["submitUnit"]))
{
  $count =0;
  $res = mysqli_query($link,"select * from units where unit ='$_POST[unitname]'") or die(mysqli_error($link));
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
    mysqli_query($link,"insert into units values (NULL,'$_POST[unitname]')") or die(mysqli_error($link));
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
