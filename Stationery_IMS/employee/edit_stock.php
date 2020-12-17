<?php
include "checklogin.php";
include "header.php";
include "connection.php";
$id = $_GET["id"];
$companyname="";
$productname="";
$packingsize="";
$unit="";
$product_qty=0;
$sell_price =0;
$res = mysqli_query($link, "select * from stock_master where id = $id");
while($row=mysqli_fetch_array($res))
{
  $companyname=$row["company_name"];
  $productname=$row["product_name"];
  $packingsize=$row["prod_pack_size"];
  $unit=$row["product_unit"];
  $product_qty = $row["prod_qty"];
  $sell_price = $row["prod_sell_price"];
}
 ?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
          <a href="stock_master.php" title="Add and View Products" class="tip-bottom"><i class="fas fa-warehouse"></i>Stock Master</a>
          <a href="#" title="Current page" class="tip-bottom">Edit Stock Price</a>
        </div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
          <div class="span12">
            <div class="widget-box">

              <div class="widget-title"> <span class="icon"> <i class="fas fa-edit"></i></span>
                <h5>Edit Stock Price</h5>
              </div>

              <div class="widget-content nopadding">

                <form name = "EditProduct" action="" method="post" class="form-horizontal">

                  <div class="control-group">
                    <label class="control-label">Product Company :</label>
                    <div class="controls">
                        <input type="text" class="span11" placeholder="Product Company" name ="companyname" value = "<?php echo $companyname; ?>" readonly/>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">Product Name :</label>
                    <div class="controls">
                      <input type="text" class="span11" placeholder="Product name" name ="productname" value = "<?php echo $productname; ?>" readonly/>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">Packing size:</label>
                    <div class="controls">
                      <input type="text" class="span11" placeholder="Packing Size" name ="packingsize" value = "<?php echo $packingsize; ?>" readonly/>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">Product Unit :</label>
                    <div class="controls">
                      <input type="text" class="span11" placeholder="Unit" name ="unit" value = "<?php echo $unit; ?>" readonly/>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">Product Quantity:</label>
                    <div class="controls">
                      <input type="text" class="span11" placeholder="Product Quantity" name ="prodqty" value = "<?php echo $product_qty; ?>" readonly/>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">Selling Price:</label>
                    <div class="controls">
                      <input type="text" class="span11" placeholder="Selling Price" name ="sellprice" value = "<?php echo $sell_price; ?>"/>
                    </div>
                  </div>

                  <div class="form-actions">
                    <button type="submit" name = "EditStockPrice" class="btn btn-success">Save</button>
                  </div>

                  <div class="alert alert-success" role="alert" id = "success" style="display:none">
                      Selling Price Updated Succesfully
                  </div>
                </form>
              </div>
            </div>
        </div>
</div>
    </div>
</div>

<?php

if(isset($_POST["EditStockPrice"]))
{
  mysqli_query($link,"update stock_master set prod_sell_price = $_POST[sellprice] where id = $id") or die(mysqli_error($link));
  ?>
    <script type="text/javascript">
    document.getElementById("success").style.display="block"
    setTimeout(function(){
      window.location.href = "stock_master.php";
    },1500)
    </script>
    <?php
}


?>

<!--end-main-container-part-->

<?php
include "footer.php";
 ?>
