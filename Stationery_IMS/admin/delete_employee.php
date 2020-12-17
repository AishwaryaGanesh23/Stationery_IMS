<?php
include "checklogin.php";
include "../employee/connection.php";
$id = $_GET["id"];
mysqli_query($link,"delete from user_registration where id = $id") or die(mysqli_error($link));
 ?>
 <script type="text/javascript">
    window.location = "add_employee.php";
</script>
