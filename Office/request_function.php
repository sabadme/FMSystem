<?php 
if(isset($_REQUEST['send_request'])){
$accountname=$_SESSION['account'];
$messagetype=$_REQUEST['messagetype'];

include"admin/connection.php";


$get_requestID=mysql_query("SELECT * FROM tbl_login WHERE account ='$accountname'");
$data_request=mysql_fetch_array($get_requestID);
$request_id=$data_request['id'];

$date=date("Y/m/d");
$time=date("h:i:sa");

$insert=mysql_query("INSERT INTO request VALUES(0,'$request_id','$messagetype','$time','$date','Pending')");
echo mysql_error();     
  
if($insert){ ?> <script> 

 alert("Record Successfully Added"); </script>
 <?php
}else {
  echo "Error adding record"; 
}




}

 ?>