<?php
include "checklogin.php";
include "header.php";
 ?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="#" title="Current page" class="tip-bottom"><i class="icon-home"></i>
            Home</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            Employee Homepage Welcome <?php echo $_SESSION["employee"] ?>

            <div class="span12">
              <div class="widget-box">
                <div class="widget-content nopadding">
                  <table class="table table-bordered" style="text-align:center; ">
                    <thead >
                      <tr >
                        <th style="background-color: white;"><a href="purchase_master.php"><img src="img\money-check-alt-solid.svg" width="110"></a></th>
                        <th style="background-color: white;"><a href="sales_master.php"><img src="img\cash-register-solid.svg" width="100"></a></th>
                        <th style="background-color: white;"><a href="purchase_report.php"><img src="img\receipt-solid.svg" width="75"></a> </th>
                        <th style="background-color: white;"><a href="view_bills.php"><img src="img\file-invoice-dollar-solid.svg" width="75"></a></th>
                      </tr>
                        <tr>
                      <th>Purchase</th>
                      <th>Sell</th>
                      <th>Purchase Report</th>
                      <th>Sales Report</th>
                      </tr>
                      <tr>
                        <th style="background-color: white;"><a href="stock_master.php"><img src="img\warehouse-solid.svg" width="110"></a></th>
                        <th style="background-color: white;"><a href="returned_products_list.php"><img src="img\undo-alt-solid.svg" width="100"></a></th>
                        <th style="background-color: white;"><a href="customers.php"><img src="img\address-book-solid.svg" width="75"></a></th>
                        <th style="background-color: white;"></th>
                      </tr>
                      <tr>
                    <th>Stocks</th>
                    <th>Returns</th>
                    <th>Customers</th>
                    <th></th>
                    </tr>
                      </thead>
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
