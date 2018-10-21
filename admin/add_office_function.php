<?php 
if(isset($_REQUEST['addoffices'])){

$account=$_REQUEST['account'];
$usernames=$_REQUEST['username'];
$passwords=$_REQUEST['password'];
$building=$_REQUEST['building'];
$floor=$_REQUEST['floor'];

include"admin/connection.php";

$null="null";	
$status="Office";
$under="Admin";
$ed_status="Pending";
$middlename="null";

$add_office=mysql_query("INSERT INTO tbl_login VALUES(0,'$account','$usernames','$passwords','$null','$null','$status','$under','$ed_status','$middlename','building','$floor')");
echo mysql_error();  
if($add_office){
	
	?> <script> 
 alert("Record Successfully Added "); </script>
 <?php 
}else {
  echo "Error adding record"; 
}

}
 ?>