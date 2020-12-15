<?php
include "../../employee/connection.php";
$companyname = $_GET["companyname"];
$res = mysqli_query($link, "select product_name from products where company_name = '$companyname' group by product_name") or die(mysqli_error($link));
?>
<select class = "span11" name = "productname" id = "productname" onchange="select_product(this.value,'<?php echo $companyname ?>')">
<option>Select</option>
<?php
while($row=mysqli_fetch_array($res))
{
  echo "<option>";
  echo $row["product_name"];
  echo "</option>";
}
echo "</select>";
 ?>
