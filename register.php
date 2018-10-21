<?php 
if(isset($_REQUEST['register'])){
$officename=$_REQUEST['officename'];
$user=$_REQUEST['username'];
$pass=$_REQUEST['password'];

$servername ="localhost";
$username="root";
$password1="";
$db="monitoringsystemdatabase";

$conn =mysql_connect($servername,$username,$password1);
mysql_select_db($db);

$sql_insert=mysql_query("INSERT INTO tbl_login VALUES(0,'$officename','$user','$pass')");
echo mysql_error();     
  
if($sql_insert){ ?> <script> 

 alert("Record Successfully Added"); </script>
 <?php 
}else {
  echo "Error adding record"; 
}
}
 ?>
<div class="register-form-container">
<form action="" method="POST">
<input type="text" name="officename" placeholder="Officename">
<input type="text" name="username" placeholder="Username">
<input type="text" name="password" placeholder="Password">
<button name="register" type="submit">Register</button>
</form>
</div>

