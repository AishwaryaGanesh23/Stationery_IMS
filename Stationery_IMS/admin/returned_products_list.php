<?php
include "checklogin.php";
include "header.php";
include "../employee/connection.php";
 ?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="#" title="Current page" class="tip-bottom"><i class="fas fa-undo-alt"></i>
            Returns</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
          <table class="table table-bordered">
            <tr>
              <th>Bill no</th>
              <th>Return Date</th>
              <th>Product Company</th>
              <th>Product Name</th>
              <th>Product Unit</th>
              <th>Packing Size</th>
              <th>Product Price</th>
              <th>Product Quantity</th>
              <th>Total</th>
            </tr>
            <?php
                $res = mysqli_query($link,"select * from returns order by id asc");
                while($row=mysqli_fetch_array($res))
                {
                  echo "<tr>";
                  echo "<td>"; echo $row["bill_no"]; echo "</td>";
                  echo "<td>"; echo $row["return_date"]; echo "</td>";
                  echo "<td>"; echo $row["prod_company"]; echo "</td>";
                  echo "<td>"; echo $row["prod_name"]; echo "</td>";
                  echo "<td>"; echo $row["prod_unit"]; echo "</td>";
                  echo "<td>"; echo $row["packing_size"]; echo "</td>";
                  echo "<td>"; echo "₹".$row["prod_price"]; echo "</td>";
                  echo "<td>"; echo $row["prod_qty"]; echo "</td>";
                  echo "<td>";  echo "₹".$row["total"]; echo "</td>";
                  echo "</tr>";
                }
             ?>
          </table>
        </div>

    </div>
</div>

<!--end-main-container-part-->

<?php
include "footer.php";
 ?>
