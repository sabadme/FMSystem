<?php 
include"admin/connection.php";
$count ="0";
$report=mysql_query("SELECT DISTINCT report_id FROM report ORDER BY id desc");
while($data_report=mysql_fetch_array($report)){
	
	$report_id=$data_report['report_id'];

	$sqlGEt_equipmentID = mysql_query("SELECT * FROM report WHERE report_id='$report_id'");
	$dataGet_equipmentID = mysql_fetch_array($sqlGEt_equipmentID);
	$equipment_id=$dataGet_equipmentID['equipment_id'];


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
	
		
		<td><form action="" method="POST"><button value="<?php echo $report_id; ?>" name="viewCommentReport">View Messages</button></form></td>
	</tr>
	<?php
}

 ?>


 
   