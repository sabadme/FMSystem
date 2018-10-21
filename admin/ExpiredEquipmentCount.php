<?php 	

$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password);
mysql_select_db($db);

$sqlEquipment_Expired = mysql_query("SELECT `equipment_status`,  COUNT(*) AS `count` FROM equipment WHERE equipment_status='Expired' ORDER BY id desc");
	$dataEquipment_Expired = mysql_fetch_array($sqlEquipment_Expired);
	$Expired = $dataEquipment_Expired['count'];

 ?>