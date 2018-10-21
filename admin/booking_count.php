<?php 	
$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password);	
mysql_select_db($db);	

$sql=mysql_query("SELECT * FROM booking WHERE notif= '0'"); 

 $rowcount=mysql_num_rows($sql);  	
   printf("%d",$rowcount);  

 ?>