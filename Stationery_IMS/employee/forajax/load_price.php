<?php
include "../../employee/connection.php";
$companyname = $_GET["companyname"];
$productname = $_GET["productname"];
$unit = $_GET["unit"];
$packsize = $_GET["packingsize"];
$res = mysqli_query($link, "select prod_sell_price from stock_master where company_name = '$companyname' && product_name = '$productname' && product_unit  = '$unit' &&  prod_pack_size = '$packsize'") or die(mysqli_error($link));
while($row=mysqli_fetch_array($res))
{
  echo $row["prod_sell_price"];
}

?>
