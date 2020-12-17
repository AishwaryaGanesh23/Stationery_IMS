<?php
include "checklogin.php";
include "connection.php";
$id = $_GET["id"];
$bill_id="";
$companyname="";
$productname="";
$packingsize="";
$unit="";
$price="";
$qty="";
$total="";
echo $id;
$res=mysqli_query($link,"select * from billing_details where id = '$id'");
while($row=mysqli_fetch_array($res))
{
  $bill_id=$row["bill_id"];
  $companyname=$row["prod_company"];
  $productname=$row["prod_name"];
  $packingsize=$row["prod_packsize"];
  $unit=$row["prod_unit"];
  $price=$row["price"];
  $qty=$row["qty"];
  $total= $price*$qty;
}

$bill_no="";
$res2 =  mysqli_query($link,"select * from billing_header where id = '$bill_id'");
while($row2=mysqli_fetch_array($res2))
{
  $bill_no = $row2["bill_no"];
}

$today_date = date('Y-m-d');

mysqli_query($link,"insert into returns values(NULL,'$bill_no','$today_date','$companyname','$productname','$unit','$packingsize','$price','$qty','$total')");
mysqli_query($link,"update stock_master  set prod_qty = prod_qty + $qty where company_name='$companyname' && product_name='$productname' && product_unit ='$unit' && prod_pack_size = '$packingsize'");
mysqli_query($link,"delete from billing_details where id = $id");
 ?>
 <script type="text/javascript">
    alert("Item Returned Successfully");
    window.location = "view_bill_details.php?id=<?php echo $bill_id; ?>";
</script>
