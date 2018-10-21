<?php 	
$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password);	
mysql_select_db($db);	

$sql=mysql_query("SELECT * FROM report WHERE notif_count = '1'"); 

   $reportcount = $rowcount=mysql_num_rows($sql);  



$sqlBooking=mysql_query("SELECT * FROM booking WHERE notif = '0'"); 
$bookingcount = $Bookingrowcount=mysql_num_rows($sqlBooking);  


$sqlEquipmentReturn=mysql_query("SELECT * FROM booking WHERE equipmentStatus = 'Return' And returnValue='0'"); 
$equipmentReturncount = $dataEquipmentReturn=mysql_num_rows($sqlEquipmentReturn);  


  echo $total = $reportcount + $bookingcount + $equipmentReturncount;
 ?>