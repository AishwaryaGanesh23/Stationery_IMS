<?php
include "checklogin.php";
include "header.php";
include "../employee/connection.php";
 ?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="#" title="Current page" class="tip-bottom"><i class="fas fa-receipt"></i></i>
          Purchase Master</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

      <div class="widget-title"> <span class="icon"><i class="fas fa-book"></i></span>
        <h5>View Purchase report</h5>
      </div>
        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
          <div class="span12">

            <div class="widget-box">
              <div class="widget-content padding">
            <form class="form-inline" action="" name="form1" method="post">
                      <br>
                       <div class="form-group">
                           <label for="email">Select Start Date</label>
                           <input type="date" id="date_start" name="date_start" placeholder="YYYY-MM-DD" value="<?php echo date("Y-m-d") ?>">
                       </div>
                       <br>
                       <div class="form-group">
                           <label for="email">Select End Date</label>
                            <input type="date" id="date_end" name="date_end" placeholder="YYYY-MM-DD" value="<?php echo date("Y-m-d") ?>">
                       </div>
                       <br>
                       <button type="submit" name="submitStart" class="btn btn-success">Show Purchase From These Dates</button>
                       <button type="button" name="submitEnd" class="btn btn-warning" onclick="window.location.href=window.location.href">Clear Search</button>
                   </form>

                   <br>
                  </div>
                </div>

            <div class="widget-box">

            <div class="widget-title"> <span class="icon"> <i class="fas fa-plus"></i> </span>
                <h5>View Purchase</h5>
              </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Sr No</th>
                    <th>Purchased By</th>
                    <th>Company Name</th>
                    <th>Product Name</th>
                    <th>Packing Size</th>
                    <th>Unit</th>
                    <th>Supplier</th>
                    <th>Quantity</th>
                    <th>Price Paid</th>
                    <th>Price per unit</th>
                    <th>Payment Method</th>
                    <th>Purchase Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if(isset($_POST["submitStart"]))
                  {
                    $res = mysqli_query($link,"select * from purchase_master where date_of_purchase>= '$_POST[date_start]' && date_of_purchase<='$_POST[date_end]'");
                  }
                  else
                  {
                    $res = mysqli_query($link,"select * from purchase_master");
                  }
                  $count =0;
                  while($row=mysqli_fetch_array($res))
                  {
                    $count = $count +1;
                      ?>

                      <tr>
                        <td><?php echo $count ?></td>
                        <td><?php echo $row["username"] ?></td>
                        <td><?php echo $row["company_name"] ?></td>
                        <td><?php echo $row["product_name"] ?></td>
                        <td><?php echo $row["packing_size"] ?></td>
                        <td><?php echo $row["unit"] ?></td>
                          <td><?php echo $row["supplier"] ?></td>
                        <td><?php echo $row["quantity"] ?></td>
                        <td><?php echo $row["price"] ?></td>
                        <td><?php
                          $price = $row["price"];
                          $qty = $row["quantity"];
                          $ppu = bcdiv($row["price"],$row["quantity"]);
                        echo $ppu; ?></td>
                        <td><?php echo $row["payment_method"] ?></td>
                        <td><?php echo $row["date_of_purchase"] ?></td>
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

<!--end-main-container-part-->

<?php
include "footer.php";
 ?>
