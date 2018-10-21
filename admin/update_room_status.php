<?php 
if(isset($_REQUEST['Update_roomStatus'])){

$Update_roomStatus=$_REQUEST['Update_roomStatus'];
$equipment_action=$_REQUEST['equipment_action'];

include"admin/connection.php";
if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}

$update_status="UPDATE rooms_equipment SET `status`='$equipment_action' WHERE equipment='$Update_roomStatus'";

if (mysql_query($update_status)) {?>
<script>
	alert("UPDATE STATUS");
</script>

     <?php
} else {?>
    <script>alert("Error"); </script>
    <?php
}




if($equipment_action == "Drop"){
	$equipment_action="Unassigned";

$update_statuss="UPDATE equipment SET `status`='$equipment_action' WHERE id='$Update_roomStatus'";

if (mysql_query($update_statuss)) {?>
<script>
	alert("UPDATE STATUS");
</script>

     <?php
} else {?>
    <script>alert("Error"); </script>
    <?php
}
}else if($equipment_action == "Up to date"){

	

$update_statuss="UPDATE equipment SET `status`='Assigned',equipment_status='Up to date' WHERE id='$Update_roomStatus'";

if (mysql_query($update_statuss)) {?>
<script>
	alert("UPDATE STATUS");
</script>

     <?php
} else {?>
    <script>alert("Error"); </script>
    <?php
}   
	
}else {
	$equipment_action = $_REQUEST['equipment_action'];

$update_statuss="UPDATE equipment SET `equipment_status`='$equipment_action' WHERE id='$Update_roomStatus'";

if (mysql_query($update_statuss)) {?>
<script>
	alert("UPDATE STATUS");
</script>

     <?php
} else {?>
    <script>alert("Error"); </script>
    <?php
}
}


mysql_close($conn);
}
 ?>