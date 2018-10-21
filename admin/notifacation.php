<?php 


include"admin/connection.php";

$count="0";
$notification=mysql_query("SELECT * FROM booking WHERE notif='1'");
while($data_notification=mysql_fetch_array($notification)){
	 $count++;
}


?>