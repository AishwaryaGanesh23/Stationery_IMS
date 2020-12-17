<?php
include "checklogin.php";
include "header.php";
include "../employee/connection.php";
 ?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="#" title="Current page" class="tip-bottom"><i class="fas fa-money-check-alt"></i>
          Purchase Master</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
          <div class="span12">
            <div class="widget-box">

              <div class="widget-title"> <span class="icon"> <i class="fas fa-plus"></i> </span>
                <h5>Add new Purchase</h5>
              </div>

              <div class="widget-content nopadding">

                <form name = "AddProduct" action="" method="post" class="form-horizontal">

                  <div class="control-group">
                    <label class="control-label">Select Company :</label>
                    <div class="controls">
                      <select class="span11"  name = "companyname" id = "companyname" onchange="select_company(this.value)">
                        <option>Select</option>
                        <?php
                            $res = mysqli_query($link,"select * from prod_company");
                            while($row = mysqli_fetch_array($res))
                            {
                              echo "<option>";
                              echo $row["company_name"];
                              echo "</option>";
                            }
                         ?>
                      </select>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">Select Product Name :</label>
                    <div class="controls" id="productname_div">
                      <select class ="span11">
                        <option>Select</option>
                      </select>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">Select unit :</label>
                    <div class="controls" id="unit_div">
                      <select class="span11">
                        <option>Select</option>
                      </select>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">Select Packing size :</label>
                    <div class="controls" id="packingsize_div">
                      <select class="span11" >
                        <option>Select</option>
                      </select>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">Enter Qty :</label>
                    <div class="controls">
                      <input type="text" name ="qty" value ="0" class = "span11">
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">Enter Price :</label>
                    <div class="controls">
                      <input type="text" name ="price" value ="0" class = "span11">
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">Select Supplier :</label>
                    <div class="controls">
                      <select class="span11" name="supplier">
                        <option>Select</option>
                        <?php
                         $res = mysqli_query($link,"select * from suppliers");
                         while($row = mysqli_fetch_array($res))
                         {
                           echo "<option>";
                           echo $row["name"];
                           echo "</option>";
                         }
                         ?>
                      </select>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">Select Payment Method :</label>
                    <div class="controls">
                      <select class="span11" name="payment_method">
                        <option>Cash</option>
                        <option>Debit Card</option>
                        <option>Credit Card</option>
                        <option>Digital Payment</option>
                        <option>Bank Transfer</option>

                      </select>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">Date Of Purchase:</label>
                    <div class="controls">
                      <input type="date" id="date_of_purchase" name="date_of_purchase" placeholder="YYYY-MM-DD" value="<?php echo date("Y-m-d") ?>" readonly>
                    </div>
                  </div>

                  <div class="form-actions">
                    <button type="submit" name = "submitPurchase" class="btn btn-success">Purchase Now</button>
                  </div>

                  <div class="alert alert-success" role="alert" id = "success" style="display: none">
                      Purchase recorded Succesfully
                  </div>
                </form>
              </div>
            </div>

        </div>

    </div>
</div>
<script type="text/javascript">
  function select_company(companyname)
  {
    var xmlhttp= new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
      if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
      {
        document.getElementById("productname_div").innerHTML=xmlhttp.responseText;
      }
    };
    xmlhttp.open("GET","forajax/load_product_using_company.php?companyname="+companyname,true);
    xmlhttp.send();
  }

  function select_product(productname,companyname)
  {
    var xmlhttp= new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
      if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
      {
        document.getElementById("unit_div").innerHTML=xmlhttp.responseText;
      }
    };
    xmlhttp.open("GET","forajax/load_unit_using_product.php?productname="+productname+"&companyname="+companyname,true);
    xmlhttp.send();
  }

  function select_unit(unit,productname,companyname)
  {
    var xmlhttp= new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
      if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
      {
        document.getElementById("packingsize_div").innerHTML=xmlhttp.responseText;
      }
    };
    xmlhttp.open("GET","forajax/load_packingsize_using_unit.php?unit="+unit+"&productname="+productname+"&companyname="+companyname,true);
    xmlhttp.send();
  }
</script>




<?php

if(isset($_POST["submitPurchase"]))
{
    $todays_date = date("Y-m-d");
    mysqli_query($link,"insert into purchase_master values(NULL,'$_POST[companyname]','$_POST[productname]','$_POST[unit]','$_POST[packingsize]',$_POST[qty],$_POST[price],'$_POST[supplier]','$_POST[payment_method]','$todays_date','$_SESSION[employee]')")or die(mysqli_error($link));

    $count =0;
    $res = mysqli_query($link,"select * from stock_master where company_name ='$_POST[companyname]'&& product_name ='$_POST[productname]' && product_unit='$_POST[unit]' && prod_pack_size = '$_POST[packingsize]'")or die(mysqli_error($link));
    $count = mysqli_num_rows($res);

    if($count == 0)
    {
      mysqli_query($link,"insert into stock_master values(NULL,'$_POST[companyname]','$_POST[productname]','$_POST[unit]','$_POST[packingsize]',$_POST[qty],0)")or die(mysqli_error($link));
    }
    else
    {
        mysqli_query($link,"update stock_master set prod_qty = prod_qty + $_POST[qty] where company_name ='$_POST[companyname]'&& product_name ='$_POST[productname]' && product_unit='$_POST[unit]' && prod_pack_size = '$_POST[packingsize]'")or die(mysqli_error($link));
    }

    ?>
    <script type="text/javascript">
    document.getElementById("success").style.display="block";
    setTimeout(function(){
      window.location.href =window.location.href;
    },1000)
    </script>
    <?php

}

?>

<!--end-main-container-part-->

<?php
include "footer.php";
 ?>
