<?php
session_start();

$max=0;
if(isset($_SESSION['cart']))
{
    $max = sizeof($_SESSION['cart']);
}
for ($i = 0;$i < $max; $i++)
{
    if (isset($_SESSION['cart'][$i])) {
        $companyname = "";
        $productname = "";
        $unit = "";
        $packsize = "";
        $qty="";
        while (list ($key, $value) = each($_SESSION['cart'][$i]))
        {
            if ($key == "companyname") {
                $companyname = $value;
            } else if ($key == "productname") {
                $productname = $value;
            } else if ($key == "unit") {
                $unit = $value;
            } else if ($key == "packingsize") {
                $packsize = $value;
            }
            else if($key=="qty")
            {
                $qty=$value;
            }
        }
        echo $companyname." ".$productname." ".$unit." ".$packsize." ".$qty;
        echo "<br>";
    }


}
?>
