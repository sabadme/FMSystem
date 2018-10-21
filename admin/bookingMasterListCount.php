<?php 	

$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password);
mysql_select_db($db);

$sqlBookingList= mysql_query("SELECT `status`,  COUNT(*) AS `count` FROM booking WHERE status='Approved' OR status='Pending'  ORDER BY id desc");
	$dataBookingList = mysql_fetch_array($sqlBookingList);
	$bookingList = $dataBookingList['count'];

 ?>