<?php
include "../../employee/connection.php";
$companyname = $_GET["companyname"];
$productname = $_GET["productname"];
$unit = $_GET["unit"];
$res = mysqli_query($link, "select packing_size from products where company_name = '$companyname' && product_name = '$productname' && unit = '$unit' group by packing_size") or die(mysqli_error($link));
?>
<select class = "span11" name = "packingsize" id="packingsize" >
<option>Select</option>
<?php
while($row=mysqli_fetch_array($res))
{
  echo "<option>";
  echo $row["packing_size"];
  echo "</option>";
}
echo "</select>";
 ?>
