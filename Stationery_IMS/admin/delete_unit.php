<?php
include "../employee/connection.php";
$id = $_GET["id"];
mysqli_query($link,"delete from units where id = $id")or die(mysqli_error($link));
 ?>
 <script type="text/javascript">
    window.location = "add_unit.php";
</script>
 ?>
