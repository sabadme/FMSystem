<?php 
if(isset($_REQUEST['updateEquipment'])){
	$updateEquipment = $_REQUEST['updateEquipment'];

	include"admin/connection.php";

	if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}

$updateSigle="UPDATE equipment SET status='Unassigned',set_name='None' WHERE id='$updateEquipment'";

if (mysql_query($updateSigle)) {?>
<script>
	alert("UPDATE STATUS");
</script>

     <?php
} else {?>
    <script>alert("Error"); </script>
    <?php
}


$updateSet="UPDATE equipmentset SET drop_equipment='0' WHERE id='$updateEquipment'";

if (mysql_query($updateSet)) {?>
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