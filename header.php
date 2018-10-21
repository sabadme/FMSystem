
<?php 
session_start();

$accountname=$_SESSION['account'];
echo $accountname;
?>
<header>

<div class="logo-container">
	<img src="images/lccb.png" />

	<span>Facility Equipment Monitoring System</span>
</div>	
<div class="login-container">
	<?php if ($accountname =="Admin"): ?>
		<div class="mainUser-container">
			<span class="username"><?php echo $accountname; ?></span>

			<a href="logout.php" class="logout" />
		</div>
	<?php else: ?>
		<span class="login">LOGIN</span>
	<?php endif; ?>

	<?php include"login.php"; ?> 
</div>

</header>