<?php
include "header.php";
include "../employee/connection.php";
 ?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="#" title="Current page" class="tip-bottom"><i class="fas fa-users"></i>
            Employees</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
          <div class="span12">
            <div class="widget-box">

              <div class="widget-title"> <span class="icon"> <i class="fas fa-plus"></i></span>
                <h5>Add New Employee</h5>
              </div>

              <div class="widget-content nopadding">

                <form name = "AddEmployee" action="" method="post" class="form-horizontal">
                  <div class="control-group">
                    <label class="control-label">First Name :</label>
                    <div class="controls">
                      <input type="text" class="span11" placeholder="First name" name ="firstname" />
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">Last Name :</label>
                    <div class="controls">
                      <input type="text" class="span11" placeholder="Last name" name = "lastname" />
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">Username :</label>
                    <div class="controls">
                      <input type="text" class="span11" placeholder="Username" name = "username" />
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">Password</label>
                    <div class="controls">
                      <input type="password"  class="span11" placeholder="Enter Password" name ="password" />
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">Select Role :</label>
                    <div class="controls">
                    <select name = "role" class="span11" >
                      <option>employee</option>
                      <option>admin</option>
                    </select>
                    </div>
                  </div>

                  <div class="alert alert-danger" role="alert" id = "error" style="display:none">
                      This Username already exists
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
                    <th>First name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Role</th>
                      <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $res = mysqli_query($link,"select * from user_registration");
                  while($row=mysqli_fetch_array($res))
                  {
                      ?>

                      <tr>
                        <td><?php echo $row["firstname"] ?></td>
                        <td><?php echo $row["lastname"] ?></td>
                        <td><?php echo $row["username"] ?></td>
                        <td><?php echo $row["role"] ?></td>
                        <td><?php echo $row["status"] ?></td>
                        <td><a href="edit_employee.php?id=<?php echo $row["id"]; ?>" style="color:#11C2A3"> Edit </a></td>
                        <td><a href="delete_employee.php?id=<?php echo $row["id"];?>"  style="color:#9C0F00"> Delete </a></td>
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
  $count =0;
  $res = mysqli_query($link,"select * from user_registration where username ='$_POST[username]'") or die(mysqli_error($link));
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
    mysqli_query($link,"insert into user_registration values (NULL,'$_POST[firstname]','$_POST[lastname]','$_POST[username]','$_POST[password]','$_POST[role]','active' )") or die(mysqli_error($link));
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
