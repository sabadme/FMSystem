<?php 
if(isset($_REQUEST['add_user'])){

$firstname=$_REQUEST['firstname'];
$lastname=$_REQUEST['lastname'];
$user=$_REQUEST['username'];
$pass=$_REQUEST['password'];
$account="User";
$status=$_REQUEST['status'];
$middlename=$_REQUEST['middlename'];
$FL=$firstname.' '.$lastname;
$under="Admin";
$ed_status="Pending";

include"admin/connection.php";

$adduser=mysql_query("INSERT INTO tbl_login VALUES(0,'$FL','$user','$pass','$firstname','$lastname','$status','$under','$ed_status','$middlename','None','None')");
echo mysql_error();     
  
if($adduser){ ?> <script> 

 alert("Record Successfully Added"); </script>
 <?php
}else {
  echo "Error adding record"; 
}
}
 ?>