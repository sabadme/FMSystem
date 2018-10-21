<?php 
$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";	


$conn =mysql_connect($servername,$username,$password);
mysql_select_db($db);


$sql_facilities = mysql_query("SELECT `Status`,  COUNT(*) AS `count` FROM tbl_login WHERE Status='Teacher' Or Status = 'Technician'");
	$data_Facilities = mysql_fetch_array($sql_facilities);
	$count = $data_Facilities['count'];

 ?>