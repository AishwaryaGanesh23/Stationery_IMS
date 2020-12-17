<?php
include "checklogin.php";
include "header.php";
include "connection.php";
$id = $_GET["id"];
$phno="";
$full_name="";
$payment_type="";
$bill_date="";
$bill_no="";
$res = mysqli_query($link,"select * from billing_header where id = $id");

while($row=mysqli_fetch_array($res))
{
  $phno=$row["phno"];
  $res2 = mysqli_query($link,"select * from customers where phno = $phno");
  while($row2=mysqli_fetch_array($res2))
  {
    $full_name= $row2["full_name"];
  }
  $payment_type=$row["payment_method"];
  $bill_date=$row["date"];
  $bill_no=$row["bill_no"];

}
 ?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
          <a href="view_bills.php" title="View All Bills" class="tip-bottom"><i class="fas fa-home"></i>View Bills</a>
          <a href="#" title="Current page" class="tip-bottom"></i>Bill Details</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
          <div class="widget-title"> <span class="icon"><i class="fas fa-book"></i></span>
            <h5>View Bill Details</h5>
          </div>
            <table>
              <tr>
                <td>Bill No: </td>
                <td><?php echo $bill_no;?></td>
              </tr>
              <tr>
                <td>Phone Number: </td>
                <td><?php echo $phno; ?></td>
              </tr>
              <tr>
                <td>Full Name: </td>
                <td><?php echo $full_name; ?></td>
              </tr>
              <tr>
                <td>Payment Type: </td>
                <td><?php echo $payment_type;?></td>
              </tr>
              <tr>
                <td>Bill date: </td>
                <td><?php echo $bill_date;?></td>
              </tr>
            </table>
            <br>
            <table class="table table-bordered">
              <tr>
                <th>Company</th>
                <th>Product</th>
                <th>Unit</th>
                <th>Packing Size</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Return</th>
              </tr>
              <?php
              $total=0;
              $res=mysqli_query($link,"select * from billing_details where bill_id = $id");

              while($row=mysqli_fetch_array($res))
              {
                echo "<tr>";
                echo "<td>"; echo $row["prod_company"]; echo "</td>";
                echo "<td>"; echo $row["prod_name"]; echo "</td>";
                echo "<td>"; echo $row["prod_unit"]; echo "</td>";
                echo "<td>"; echo $row["prod_packsize"]; echo "</td>";
                echo "<td>"; echo "₹".$row["price"]; echo "</td>";
                echo "<td>"; echo $row["qty"]; echo "</td>";
                echo "<td>";  echo "₹".($row["price"])*($row["qty"]); echo "</td>";
                  echo "<td>";?> <a href="return.php?id=<?php echo $row["id"]; ?>" style="color:#f5690c">Return Item</a> <?php echo "</td>";
                echo "</tr>";
                $total = $total+($row["price"])*($row["qty"]);
              }

               ?>
            </table>
            <div align="right" font-weight: "bold">
                Grand Total: <?php echo "₹".$total; ?>
            </div>
        </div>
</div>
    </div>
</div>

<!--end-main-container-part-->



<?php
include "footer.php";
 ?>
