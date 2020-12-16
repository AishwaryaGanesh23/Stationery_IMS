<?php
include "header.php";
include "../employee/connection.php";
 ?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="#" title="Current page" class="tip-bottom"><i class="fas fa-home"></i>
            View Bills</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
          <div class="widget-title"> <span class="icon"><i class="fas fa-book"></i></span>
            <h5>View Bills</h5>
          </div>
            <table class="table table-bordered">
              <tr>
                <th>Bill number</th>
                <th>Phone Number</th>
                <th>Payment Method</th>
                <th>Billing Date</th>
                <th>Bill Total</th>
                <th>View Details</th>
              </tr>

              <?php
               $res = mysqli_query($link,"select * from billing_header order by id desc");
               while($row = mysqli_fetch_array($res))
               {
                 echo "<tr>";
                 echo "<td>"; echo $row["bill_no"]; echo "</td>";
                 echo "<td>"; echo $row["phno"]; echo "</td>";
                 echo "<td>"; echo $row["payment_method"]; echo "</td>";
                 echo "<td>"; echo $row["date"]; echo "</td>";
                 echo "<td>";  echo "₹".get_total($row["id"],$link); echo "</td>";
                 echo "<td>";?><a href="view_bill_details.php?id=<?php echo $row["id"];?>" style="color:#11C2A3" > View Details </a> <?php echo "</td>";
                 echo "</tr>";
               }
               ?>
            </table>
        </div>

    </div>
</div>

<!--end-main-container-part-->

<?php

function get_total($bill_id, $link)
{
  $total=0;
  $res2=mysqli_query($link, "select * from billing_details where bill_id = '$bill_id'");
  while ($row=mysqli_fetch_array($res2))
  {
    $total = $total+($row["price"]*$row["qty"]);
  }
  return $total;
}

 ?>


<?php
include "footer.php";
 ?>
