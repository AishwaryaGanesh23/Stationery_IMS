<?php
include "checklogin.php";
include "header.php";
include "connection.php";
 ?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="#" title="Current page" class="tip-bottom"><i class="fas fa-warehouse"></i>
          Stock master</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
          <div class="span12">
            <div class="widget-box">

              <div class="widget-title"> <span class="icon"><i class="fas fa-book"></i></span>
                <h5>Stock Master</h5>
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
                    <th>Quantity</th>
                    <th>Sell Price</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $res = mysqli_query($link,"select * from stock_master");
                  while($row=mysqli_fetch_array($res))
                  {
                      ?>

                      <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["company_name"] ?></td>
                        <td><?php echo $row["product_name"] ?></td>
                        <td><?php echo $row["prod_pack_size"] ?></td>
                        <td><?php echo $row["product_unit"] ?></td>
                        <td><?php echo $row["prod_qty"] ?></td>
                        <td><?php echo $row["prod_sell_price"] ?></td>
                        <td><center><a href="edit_stock.php?id=<?php echo $row["id"]; ?>" style="color:#11C2A3"> Edit </a></center></td>
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
<!--end-main-container-part-->

<?php
include "footer.php";
 ?>
