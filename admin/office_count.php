<?php 
$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password);
mysql_select_db($db);


$sql_Office = mysql_query("SELECT `Status`,  COUNT(*) AS `count` FROM tbl_login WHERE Status='Office'");
	$data_office = mysql_fetch_array($sql_Office);
	$officeCount = $data_office['count'];

 ?>