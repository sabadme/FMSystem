<?php 
if(isset($_REQUEST['update_equipment_single'])){
	$update_equipment_single=$_REQUEST['update_equipment_single'];
	$file=$_FILES['imgs'];

	$name=$_FILES['imgs'] ['name'];
	$size=$_FILES['imgs'] ['size'];	
	$type=$_FILES['imgs'] ['type'];
	$error=$_FILES['imgs'] ['error'];
	$tmp=$_FILES['imgs'] ['tmp_name'];

	if ($error > 0) {
		die("Error uploading File! Code $error.");
	}
	if ($type=="video/avi") {
		die("That Format is not allowed!");
	}
	else{
		move_uploaded_file($tmp,"EquipmentPicture/".$name);
		
	}


	
	$equipment_name=$_REQUEST['equipment_name'];
	$equipment_start=$_REQUEST['equipment_start'];
	$equipment_end=$_REQUEST['equipment_end'];
	$equipmentType = $_REQUEST['equipmentType'];

   
include"admin/connection.php";



if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}

$update_status="UPDATE equipment SET `equipment_name`='$equipment_name',`equipment_start`='$equipment_start',`equipment_end`='$equipment_end',`equipment_filename`='$name',`equipmentType`='$equipmentType' WHERE id='$update_equipment_single'";

if (mysql_query($update_status)) {?>
<script>
	alert("UPDATE STATUS");
</script>

     <?php
} else {?>
    <script>alert("Error"); </script>
    <?php
}


}

 ?>