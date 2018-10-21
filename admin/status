<?php 
include"admin/connection.php";

$report=mysql_query("SELECT * FROM report ORDER BY id desc");
while($data_report=mysql_fetch_array($report)){
	$equipment_id=$data_report['equipment_id'];
	$report_id=$data_report['report_id'];

	$user_report=mysql_query("SELECT * FROM tbl_login WHERE id='$report_id'");
	$data_user=mysql_fetch_array($user_report);

	$sql_rooms=mysql_query("SELECT * FROM rooms_equipment WHERE equipment='$equipment_id'");
	$data_sql_rooms=mysql_fetch_array($sql_rooms);
	$set_status=$data_sql_rooms['set_status'];

	if($set_status=="Set"){
		$sql_equipmentSet=mysql_query("SELECT * FROM equipmentset WHERE id='$equipment_id'");
		$data_equipmentSet=mysql_fetch_array($sql_equipmentSet);
		$EquipmentName=$data_equipmentSet['set_name'];
	}else {

		$sql_equipment=mysql_query("SELECT * FROM equipment WHERE id='$equipment_id'");
		$data_equipment=mysql_fetch_array($sql_equipment);
		$EquipmentName=$data_equipment['equipment_name'];
	}
	?>
	<tr>
		<td><?php echo $data_user['account'] ?></td>
		<td><?php echo $EquipmentName; ?></td>
		<td><?php echo $data_report['report_message']; ?></td>
	</tr>
	<?php
}

 ?>