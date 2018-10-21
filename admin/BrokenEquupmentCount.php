<?php 	

$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password);
mysql_select_db($db);

$sqlEquipment_Broken = mysql_query("SELECT `equipment_status`,  COUNT(*) AS `count` FROM equipment WHERE equipment_status='Expired' ORDER BY id desc");
	$dataEquipment_Broken = mysql_fetch_array($sqlEquipment_Broken);
	$Broken = $dataEquipment_Broken['count'];

 ?>