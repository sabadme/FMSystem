<?php 	

$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password);
mysql_select_db($db);

$sqlBookingList_approved= mysql_query("SELECT `status`,  COUNT(*) AS `count` FROM booking WHERE status='Approved'  ORDER BY id desc");
	$dataBookingList_approved = mysql_fetch_array($sqlBookingList_approved);
	$Approved = $dataBookingList_approved['count'];

 ?>