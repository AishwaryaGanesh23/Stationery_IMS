<?php
session_start();
include "../../employee/connection.php";
$companyname = $_GET["companyname"];
$productname = $_GET["productname"];
$unit = $_GET["unit"];
$packsize = $_GET["packingsize"];
$price = $_GET["price"];
$qty =$_GET["qty"];
$total =$_GET["total"];


$av_qty=0;
$exist_qty=0;
$exist_qty=$qty;

$av_qty=check_stock_qty($companyname,$productname,$unit,$packsize,$link);
if($av_qty>=$exist_qty)
{
  $check_session_prod= check_product_no_session($companyname,$productname,$unit,$packsize);
  $b =array("companyname"=>$companyname,"productname"=>$productname,"unit"=>$unit,"packingsize"=>$packsize,"price"=>$price,"qty"=>$exist_qty);
  $_SESSION['cart'][$check_session_prod] = $b;
}
else
{
  echo "Entered Quantity is not available";
}




function check_stock_qty($companyname,$productname,$unit,$packsize,$link)
{
  $prod_qty = 0;
  $res=mysqli_query($link,"select * from stock_master where company_name ='$companyname'&& product_name ='$productname' && product_unit='$unit' && prod_pack_size = '$packsize'");
  while($row=mysqli_fetch_array($res))
  {
    $prod_qty = $row["prod_qty"];
  }

  return $prod_qty;
}

function check_duplicate_product($companyname,$productname,$unit,$packsize)
{
  $found =0;
  $max = sizeof($_SESSION['cart']);
  for($i=0;$i<$max;$i++)
  {
    if(isset($_SESSION['cart'][$i]))
    {
      $companyname_session ="";
      $productname_session="";
      $unit_session="";
      $packsize_session="";

      foreach($_SESSION['cart'][$i] as $key => $value)
      {
        if($key == "companyname")
        {
          $companyname_session = $value;
        }
        else if ($key == "productname")
        {
            $productname_session = $value;
        }
        else if ($key == "unit")
        {
            $unit_session = $value;
        }
        else if ($key == "packingsize")
        {
            $packsize_session = $value;
        }
      }
      if($companyname_session==$companyname && $productname_session==$productname && $unit_session==$unit & $packsize_session==$packsize)
      {
        $found=$found+1;
      }
    }
  }
  return $found;
}

function check_sess_qty($companyname,$productname,$unit,$packsize)
{
  $qtyfound =0;
  $qty_session=0;
  $max = sizeof($_SESSION['cart']);
  for($i=0;$i<$max;$i++)
  {
    $companyname_session ="";
    $productname_session="";
    $unit_session="";
    $packsize_session="";
    if(isset($_SESSION['cart'][$i]))
    {
      foreach($_SESSION['cart'][$i] as $key => $value)
      {
        if($key == "companyname")
        {
          $companyname_session = $value;
        }
        else if ($key == "productname")
        {
            $productname_session = $value;
        }
        else if ($key == "unit")
        {
            $unit_session = $value;
        }
        else if ($key == "packingsize")
        {
            $packsize_session = $value;
        }
        else if($key=="qty")
        {
            $qty_session=$value;
        }

      }
      if($companyname_session==$companyname && $productname_session==$productname && $unit_session==$unit & $packsize_session==$packsize)
      {
        $qtyfound=$qty_session;
      }
    }
  }
  return $qtyfound;
}

function check_product_no_session($companyname,$productname,$unit,$packsize)
{
  $record_no =0;
  $max = sizeof($_SESSION['cart']);
  for($i=0;$i<$max;$i++)
  {
    if(isset($_SESSION['cart'][$i]))
    {
      $companyname_session ="";
      $productname_session="";
      $unit_session="";
      $packsize_session="";

      foreach($_SESSION['cart'][$i] as $key => $value)
      {
        if($key == "companyname")
        {
          $companyname_session = $value;
        }
        else if ($key == "productname")
        {
            $productname_session = $value;
        }
        else if ($key == "unit")
        {
            $unit_session = $value;
        }
        else if ($key == "packingsize")
        {
            $packsize_session = $value;
        }
      }
      if($companyname_session==$companyname && $productname_session==$productname && $unit_session==$unit & $packsize_session==$packsize)
      {
        $record_no = $i;
      }
    }
  }
  return $record_no;

}

 ?>
