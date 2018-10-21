<?php 
include"admin/connection.php";

$sql_EquipmentUptodate= mysql_query("SELECT `equipment_status`,  COUNT(*) AS `count` FROM equipment WHERE equipment_status='Up To Date'");
	$data_EquipmentUptodate = mysql_fetch_array($sql_EquipmentUptodate);
	$EquipmentUptodate = $data_EquipmentUptodate['count'];

 ?>