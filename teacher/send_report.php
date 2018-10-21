<?php 
$accountname=$_SESSION['account'];
if(isset($_REQUEST['send_report'])){
	$send_report=$_REQUEST['send_report'];
	$messagereport=$_REQUEST['messagereport'];
	$technician = $_REQUEST['technician'];
	$date = date("Y-m-d");  
	$time = date("H:i:s");

include"admin/connection.php";

	$sql_account = mysql_query("SELECT * FROM tbl_login WHERE account='$technician'");
	$data_account = mysql_fetch_array($sql_account);
	$technicianID = $data_account['id'];

	$get_equipment=mysql_query("SELECT * FROM rooms_equipment WHERE equipment='$send_report'");
	$data_equipment=mysql_fetch_array($get_equipment);
	$equipment=$data_equipment['equipment'];

	$get_equipmentId=mysql_query("SELECT * FROM equipment WHERE id='$equipment'");
	$data_equipmentid=mysql_fetch_array($get_equipmentId);
	$equipment_id=$data_equipmentid['id'];

	$get_userId=mysql_query("SELECT * FROM tbl_login WHERE account='$accountname'");
	$data_userId=mysql_fetch_array($get_userId);
	$userid=$data_userId['id'];


	$insert=mysql_query("INSERT INTO report VALUES(0,'$send_report','$userid','$technicianID','$messagereport','1','1','$date','$time','Not','Sent','None','Assigned')");echo mysql_error();     
  
if($insert){ ?> <script> 

 alert("Record Successfully Added"); </script>

 <?php

  $sql_reportID = mysql_query("SELECT * FROM report ORDER BY id desc");
 $data_reportID = mysql_fetch_array($sql_reportID);
 $reportID = $data_reportID['id'];

 	$insert_adminNotif=mysql_query("INSERT INTO admin_notif VALUES(0,'$reportID','$userid','$send_report','None','None','None','Report')");echo mysql_error();     
if($insert_adminNotif){ 

}else {
  echo "Error adding record"; 
}

}else {
  echo "Error adding record"; 
}




}

 ?>