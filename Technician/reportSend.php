<?php 
if(isset($_REQUEST['technicianReportSend'])){

$accountname;
	$date = date("Y-m-d");  
	$time = date("H:i:s");

$technicianEQUIPEMENT = $_REQUEST['technicianReportSend'];
$commentTechnician = $_REQUEST['commentTechnician'];
$doneORnot = $_REQUEST['doneORnot'];

$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password);
mysql_select_db($db);

$sql_account = mysql_query("SELECT * FROM tbl_login WHERE account='$accountname'");
$data_account = mysql_fetch_array($sql_account);
$technicianID = $data_account['id'];

$sqlReport = mysql_query("SELECT * FROM report WHERE equipment_id='$technicianEQUIPEMENT' And equipment_status='Assigned'");
$dataReport = mysql_fetch_array($sqlReport);
$userReport = $dataReport['report_id'];


$insert=mysql_query("INSERT INTO report VALUES(0,'$technicianEQUIPEMENT','$userReport','$technicianID','$commentTechnician','1','0','$date','$time','Sent','Not','$doneORnot','Assigned')");echo mysql_error();     
  
if($insert){ ?> <script> 
 alert("Record Successfully Added"); </script>
 <?php
 if($doneORnot == "Fixed"){

 	$sqlReport_ID = mysql_query("SELECT * FROM report ORDER BY id desc");
 	$data_reportID = mysql_fetch_array($sqlReport_ID);
 	$reportTableID = $data_reportID['id'];

$insert=mysql_query("INSERT INTO admin_notif VALUES(0,'$reportTableID','$technicianID','$technicianEQUIPEMENT','None','None','None','Resolved Minor')");echo mysql_error();     
  
if($insert){ 

}else{

 }
}
}else {
  echo "Error adding record"; 
}




}

 ?>