<?php 
include"admin/connection.php";

$sql_EquipmentUnassigned= mysql_query("SELECT `status`,  COUNT(*) AS `count` FROM equipment WHERE status='Unassigned'");
	$data_EquipmentUnassigned = mysql_fetch_array($sql_EquipmentUnassigned);
	$EquipmentUnassigned = $data_EquipmentUnassigned['count'];

 ?>