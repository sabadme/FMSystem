<?php 
session_start();
 ?>
<div class="login-form-container">

<form action="" method="POST">

	<input type="text" name="username" placeholder="Username">
	<input type="password" name="password" placeholder="Password">
	<button name="login" type="submit">Login</button>

</form>
</div>
<?php 
if(isset($_REQUEST['login'])){
$user=$_REQUEST['username'];
$pass=$_REQUEST['password'];

include"admin/connection.php";

$sql=mysql_query("SELECT * FROM tbl_login WHERE username='$user' And password='$pass'");
$sql_row=mysql_fetch_array($sql);

$id=$sql_row['id'];
$account=$sql_row['account'];
$ed_status=$sql_row['ED_status'];
$status=$sql_row['Status'];

if($user==$sql_row['username'] && $pass==$sql_row['password']){


	if($ed_status=="Enabled"){
	$_SESSION['account']=$account;
	$_SESSION['status']=$status;
	$_SESSION['id']=$id;
	header("location:main.php?id=$id");
	}else{
		?>
			<script> 
		 alert("Your account has been disabled. Please check your account at the admin office.");
		 </script> 
		<?php
	}


}else{

	?>
	<script> 
 alert("Username or Password Error"); 
 header("location:home.php");
 	</script>
 	<?php
 	
}

}
 ?>