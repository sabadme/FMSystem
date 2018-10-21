<?php 
include"admin/connection.php";

$sql_EquipmentAssigned = mysql_query("SELECT `status`,  COUNT(*) AS `count` FROM equipment WHERE status='Assigned'");
	$data_EquipmentAssigned = mysql_fetch_array($sql_EquipmentAssigned);
	$EquipmentAssinged = $data_EquipmentAssigned['count'];

 ?>