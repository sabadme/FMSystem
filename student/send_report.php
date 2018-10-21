<?php 
$accountname=$_SESSION['account'];
if(isset($_REQUEST['send_report'])){
	$send_report=$_REQUEST['send_report'];
	$messagereport=$_REQUEST['messagereport'];

$servername ="localhost";
$username="root";
$password1="";	
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password1);
mysql_select_db($db);

	$get_equipment=mysql_query("SELECT * FROM room WHERE id='$send_report'");
	$data_equipment=mysql_fetch_array($get_equipment);
	$equipment=$data_equipment['equipment'];

	$get_equipmentId=mysql_query("SELECT * FROM equipment WHERE equipment_name='$equipment'");
	$data_equipmentid=mysql_fetch_array($get_equipmentId);
	$equipment_id=$data_equipmentid['id'];

	$get_userId=mysql_query("SELECT * FROM tbl_login WHERE account='$accountname'");
	$data_userId=mysql_fetch_array($get_userId);
	$userid=$data_userId['id'];


	$insert=mysql_query("INSERT INTO report VALUES(0,'$send_report','$userid','$messagereport')");echo mysql_error();     
  
if($insert){ ?> <script> 

 alert("Record Successfully Added"); </script>
 <?php
}else {
  echo "Error adding record"; 
}
}

 ?>