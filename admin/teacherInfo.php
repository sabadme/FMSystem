<?php 


	$teacherIDS = $_POST['teacherIDS'];

$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password);
mysql_select_db($db);
    

$sql_teacherInfo = mysql_query("SELECT * FROM tbl_login WHERE id='$teacherIDS'");
$data_teacherInfo = mysql_fetch_array($sql_teacherInfo);


 ?>