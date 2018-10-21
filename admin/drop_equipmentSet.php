<?php 
if(isset($_REQUEST['drop_equipmentSet'])){
$drop_equipmentSet=$_REQUEST['drop_equipmentSet'];

include"admin/connection.php";

if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}

$update_status="UPDATE equipment SET `status`='Unassigned' WHERE id='$drop_equipmentSet'";

if (mysql_query($update_status)) {?>
<script>
	alert("UPDATE STATUS");
</script>

     <?php
} else {?>
    <script>alert("Error"); </script>
    <?php
}



$update_statuss="UPDATE equipmentset SET `drop_equipment`='0' WHERE quipment_id='$drop_equipmentSet'";

if (mysql_query($update_statuss)) {?>
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