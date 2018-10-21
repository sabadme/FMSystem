<?php 	

$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password);
mysql_select_db($db);

$sqlBookingList_pending= mysql_query("SELECT `status`,  COUNT(*) AS `count` FROM booking WHERE status='Pending'  ORDER BY id desc");
	$dataBookingList_pending = mysql_fetch_array($sqlBookingList_pending);
	$Pending = $dataBookingList_pending['count'];

 ?>