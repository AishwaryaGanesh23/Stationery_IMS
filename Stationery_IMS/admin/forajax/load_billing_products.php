<?php
session_start();
?>
<table class="table table-bordered">
    <tr>
        <th>Product Company</th>
        <th>Product Name</th>
        <th>Product Unit</th>
        <th>Product Size</th>
        <th>Product Price</th>
        <th>Product Qty</th>
        <th>Total</th>
        <th>Delete</th>
    </tr>
<?php
$qtyfound =0;
$qty_session=0;
$max = 0;
if(isset($_SESSION['cart']))
{
    $max = sizeof($_SESSION['cart']);
}

for($i=0;$i<$max;$i++)
{
  $companyname_session ="";
  $productname_session="";
  $unit_session="";
  $packsize_session="";
  $price_session="";
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
      else if($key=="price")
      {
          $price_session=$value;
      }
    }
    if($companyname_session!="")
    {
    ?>
        <tr>
          <td><?php echo $companyname_session; ?></td>
          <td><?php echo $productname_session; ?></td>
          <td><?php echo $unit_session; ?></td>
          <td><?php echo $packsize_session; ?></td>
          <td><?php echo $price_session; ?></td>
          <td>
            <input type="text" id="tt<?php echo $i; ?>" value="<?php echo $qty_session; ?>"/>
            &nbsp;
            <i class="fas fa-sync-alt" style="font-size:24px" onClick="edit_qty(document.getElementById('tt<?php echo $i; ?>').value,'<?php echo $companyname_session ?>','<?php echo $productname_session?>','<?php echo $unit_session?>','<?php echo $packsize_session?>','<?php echo $price_session?>')"></i>
          </td>
          <td><?php echo ($qty_session*$price_session); ?></td>
          <td style="color:#9C0F00; cursor:pointer" onclick="delete_qty('<?php echo $i; ?>')"> Delete </td>
      </tr>
    <?php
    }
  }
}

 ?>

</table>
