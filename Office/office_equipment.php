<?php 
include"admin/connection.php";


$sql_AssignedEquip = mysql_query("SELECT * FROM rooms_equipment WHERE room='$accountname'");
while($data_AssignedEquip=mysql_fetch_array($sql_AssignedEquip)){
$equipmentId = $data_AssignedEquip['equipment'];

$sql_equipment = mysql_query("SELECT * FROM equipment WHERE id='$equipmentId'");
$data_equipment = mysql_fetch_array($sql_equipment);
$equipmentPic = $data_equipment['equipment_filename'];

?>
<tr>
	<td data-th="Image"><?php echo "<img style='width: 150px;' src='EquipmentPicture/".$equipmentPic."'>" ?></td>
	<td data-th="Name"><?php echo $data_equipment['equipment_name'] ?></td>
	<td data-th="QR ID"><?php echo $data_equipment['equipment_code'] ?></td>
	<td data-th="Date Start"><?php echo $data_equipment['equipment_start'] ?></td>
	<td data-th="Date End"><?php echo $data_equipment['equipment_end'] ?></td>
	
</tr>
<?php
}
 ?>
