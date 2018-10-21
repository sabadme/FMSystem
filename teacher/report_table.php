<?php 
$accountname=$_SESSION['account'];

include"admin/connection.php";

$bookingEquipment = mysql_query("SELECT * FROM booking WHERE booker='$accountname' And status='Approved' And equipmentStatus='Not'");
while($data_bookingEquipment = mysql_fetch_array($bookingEquipment)){
	$equipmentID = $data_bookingEquipment['equipment'];
	$equipmentVenue = $data_bookingEquipment['venue'];

$sql_equipmentBooking = mysql_query("SELECT * FROM equipment WHERE id='$equipmentID'");
$data_equipmentBooking = mysql_fetch_array($sql_equipmentBooking);
$equipPic = $data_equipmentBooking['equipment_filename'];

if($equipmentID == ""){

}else{



		?>
	
	<tr>
		<td><?php echo "<img style='object-fit: cover; width: 150px;' src='EquipmentPicture/".$equipPic."'>" ?></td>
		<td><?php echo $equipmentVenue; ?></td>
		<td><?php echo $data_equipmentBooking['equipment_name']; ?></td>
		<td><?php echo $data_equipmentBooking['equipment_code']; ?></td>
		<td><form action="" method="POST"><button class="reportBtn" name="equipment_report" type="submit" value="<?php echo $data_equipmentBooking['id']; ?>">Report</button></form></td>
	</tr>
	<?php
}

}



$get_booking=mysql_query("SELECT * FROM booking WHERE booker='$accountname' And status='Approved'");
while($data_booking=mysql_fetch_array($get_booking)){
	$venue=$data_booking['venue'];

	$get_room=mysql_query("SELECT * FROM rooms_equipment WHERE room='$venue'");
	while($data_room=mysql_fetch_array($get_room)){
	$equipment=$data_room['equipment'];
	$status=$data_room['status'];
	$facility = $data_room['room'];

	$get_equipment=mysql_query("SELECT * FROM equipment WHERE id='$equipment'");
	$data_equipment=mysql_fetch_array($get_equipment);
	$equipment_filename=$data_equipment['equipment_filename'];

	if($status=="Up To Date"){
	?>
	
	<tr>
		<td><?php echo "<img style='object-fit: cover; width: 150px;' src='EquipmentPicture/".$equipment_filename."'>" ?></td>
		<td><?php echo $facility; ?></td>
		<td><?php echo $data_equipment['equipment_name']; ?></td>
		<td><?php echo $data_equipment['equipment_code']; ?></td>
		<td><form action="" method="POST"><button class="reportBtn" name="equipment_report" type="submit" value="<?php echo $data_equipment['id']; ?>">Report</button></form></td>
	</tr>
	<?php

}
}
}

$sql_roomSet=mysql_query("SELECT * FROM teachers_roomsset WHERE techears_id='$id' And set_unset='Assigned'");
while($data_roomSet=mysql_fetch_array($sql_roomSet)){
	$teachers_room=$data_roomSet['teachers_room'];

	$sql_roomEquipment=mysql_query("SELECT * FROM rooms_equipment WHERE room='$teachers_room'");
	while($data_roomEquipment=mysql_fetch_array($sql_roomEquipment)){
	$equipment_ID=$data_roomEquipment['equipment'];
	$set_status=$data_roomEquipment['set_status'];
	$facilities = $data_roomEquipment['room'];

	if($set_status=="Set"){

		$equipmentSet=mysql_query("SELECT * FROM equipmentset WHERE id='$equipment_ID'");
		$data_equipmentSet=mysql_fetch_array($equipmentSet);
		$equipment_filenameTR=$data_equipmentSet['img_filename'];
		$equipment_IDs=$data_equipmentSet['id'];
		$equipment_nameTR=$data_equipmentSet['set_name'];
		$equipment_codeTR=$data_equipmentSet['setQr_code'];


	}else{

	$sql_equipment=mysql_query("SELECT * FROM equipment WHERE id='$equipment_ID'");
	$data_equipmentTR=mysql_fetch_array($sql_equipment);
	$equipment_filenameTR=$data_equipmentTR['equipment_filename'];
	$equipment_nameTR=$data_equipmentTR['equipment_name'];
	$equipment_codeTR=$data_equipmentTR['equipment_code'];
	$equipment_IDs=$data_equipmentTR['id'];
	}


	?>
		<tr>
	
		<td><?php echo "<img style='object-fit: cover; width: 150px;' src='EquipmentPicture/".$equipment_filenameTR."'>" ?></td>
		<td><?php echo $facilities; ?></td>
		<td><?php echo $equipment_nameTR; ?></td>
		<td><?php echo $equipment_codeTR; ?></td>
		<td><form action="" method="POST"><button class="reportBtn" name="equipment_report" type="submit" value="<?php echo $equipment_IDs; ?>">Report</button></form></td>
	</tr>
	<?php

}
}
 ?>
