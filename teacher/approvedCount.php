<?php 	
session_start();
$accountname=$_SESSION['account'];
$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password);	
mysql_select_db($db);	

$sql=mysql_query("SELECT * FROM booking WHERE booker='$accountname' And hideNotif='1' And status = 'Approved'"); 

 $rowcount=mysql_num_rows($sql);  
   printf("%d",$rowcount);  

 ?>