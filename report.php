<?php 
if(isset($_REQUEST['send_report'])){
$send_report=$_REQUEST['send_report'];
$messagereport=$_REQUEST['messagereport'];

$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password);
mysql_select_db($db); 

$equipment=mysql_query("SELECT * FROM room WHERE id='$send_report'");
$data_equipment=mysql_fetch_array($equipment);
$equipment_name=$data_equipment['equipment'];
$report_name=$data_equipment['room'];

$get_name=mysql_query("SELECT * FROM tbl_login WHERE account='$report_name'");
$data_getNAME=mysql_fetch_array($get_name);
$report_id=$data_getNAME['id'];

$equipment_id=mysql_query("SELECT * FROM equipment WHERE id='$equipment_name'");
$data_equipmentID=mysql_fetch_array($equipment_id);
$id=$data_equipmentID['id'];



$insert=mysql_query("INSERT INTO report VALUES(0,'$id','$report_id','$messagereport')");
echo mysql_error();     
  
if($insert){ ?> <script> 

 alert("Record Successfully Added"); </script>
 <?php
}else {
  echo "Error adding record"; 
}


}
?>