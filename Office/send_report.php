<?php 
$accountname=$_SESSION['account'];
if(isset($_REQUEST['send_report'])){
	$send_report=$_REQUEST['send_report'];
	$messagereport=$_REQUEST['messagereport'];

	include"admin/connection.php";

	$get_userId=mysql_query("SELECT * FROM tbl_login WHERE account='$accountname'");
	$data_userId=mysql_fetch_array($get_userId);
	$userid=$data_userId['id'];

	

		$insert=mysql_query("INSERT INTO report VALUES(0,'$send_report','$userid','$messagereport','1','1')");echo mysql_error();     
  
if($insert){ ?> <script> 

 alert("Record Successfully Added"); </script>
 <?php
  $sql_reportID = mysql_query("SELECT * FROM report ORDER BY id desc");
 $data_reportID = mysql_fetch_array($sql_reportID);
 $reportID = $data_reportID['id'];

 	$insert_adminNotif=mysql_query("INSERT INTO admin_notif VALUES(0,'$reportID','$userid','$send_report','None','None','None')");echo mysql_error();     
if($insert_adminNotif){ 

}else {
  echo "Error adding record"; 
}
}else {
  echo "Error adding record"; 
}

}

 ?>