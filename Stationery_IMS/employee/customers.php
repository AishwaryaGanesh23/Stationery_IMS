<?php
include "checklogin.php";
include "header.php";
include "../employee/connection.php";
 ?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="#" title="Current page" class="tip-bottom"><i class="fas fa-address-book"></i>
          Customer List</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
          <div class="span12">
            <div class="widget-box">

              <div class="widget-title"> <span class="icon"><i class="fas fa-book"></i></span>
                <h5>Customer List</h5>
              </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Sr no</th>
                    <th>Phone Number</th>
                    <th>Customer Name</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $res = mysqli_query($link,"select * from customers");
                  $count=0;
                  while($row=mysqli_fetch_array($res))
                  { $count = $count +1;
                      ?>

                      <tr>
                        <td><?php echo $count ?></td>
                        <td><?php echo $row["phno"] ?></td>
                        <td><?php echo $row["full_name"] ?></td>
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
    </div>
</div>
<!--end-main-container-part-->

<?php
include "footer.php";
 ?>
