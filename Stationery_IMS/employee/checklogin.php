<?php
session_start();
if(!isset($_SESSION["employee"]))
{
  ?>
    <script type="text/javascript">
      window.location="index.php";
    </script>
  <?php
}
 ?>
