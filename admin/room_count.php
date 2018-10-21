<?php 
$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password);
mysql_select_db($db);


$sql_room = mysql_query("SELECT `roomOrvenue`,  COUNT(*) AS `count` FROM rooms WHERE roomOrvenue='Room'");
	$data_room = mysql_fetch_array($sql_room);
	$roomCount = $data_room['count'];

 ?>