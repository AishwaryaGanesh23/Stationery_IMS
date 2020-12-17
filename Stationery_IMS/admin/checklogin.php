<?php
session_start();
if(!isset($_SESSION["admin"]))
{
  ?>
    <script type="text/javascript">
      window.location="index.php";
    </script>
  <?php
}
 ?>
