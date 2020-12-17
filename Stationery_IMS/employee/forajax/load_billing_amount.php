<?php
session_start();
$qtyfound =0;
$qty_session=0;
$max = 0;
$grand_total=0;
if(isset($_SESSION['cart']))
{
    $max = sizeof($_SESSION['cart']);
}

for($i=0;$i<$max;$i++)
{

  $price_session="";
  if(isset($_SESSION['cart'][$i]))
  {
    foreach($_SESSION['cart'][$i] as $key => $value)
    {
      if($key=="qty")
      {
          $qty_session=$value;
      }
      else if($key=="price")
      {
          $price_session=$value;
      }
    }
      $grand_total=$grand_total+($qty_session*$price_session);
  }
}
echo $grand_total;
?>
