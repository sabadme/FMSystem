<?php 
if(isset($_REQUEST['officeenable'])){

$officeenable=$_REQUEST['officeenable'];
include"admin/connection.php";

if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}
$stat="Enabled";

$update_status="UPDATE tbl_login SET `ED_status`='$stat' WHERE id='$officeenable'";

if (mysql_query($update_status)) {?>
<script>
	alert("UPDATE STATUS");
</script>

     <?php
} else {?>
    <script>alert("Error"); </script>
    <?php
}
mysql_close($conn);
}

 ?>