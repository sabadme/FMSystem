<?php 
if(isset($_REQUEST['update_broken_status'])){

	include"admin/connection.php";

$update_broken_status=$_REQUEST['update_broken_status'];
$equipment_status=$_REQUEST['equipment_status'];

if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}


$update_status="UPDATE equipment SET `equipment_status`='$equipment_status' WHERE id='$update_broken_status'";

if (mysql_query($update_status)) {?>
<script>
	alert("UPDATE STATUS");
</script>

     <?php
} else {?>
    <script>alert("Error"); </script>
    <?php
}






$update_status1="UPDATE room SET `status`='$equipment_status' WHERE equipment='$update_broken_status'";

if (mysql_query($update_status1)) {?>
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