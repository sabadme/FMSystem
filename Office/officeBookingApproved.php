<?php 
if(isset($_POST)){
	$finalNotifVal  = $_POST['notifValue'];

$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password);	
mysql_select_db($db);	

if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}

$update_status="UPDATE booking SET `hideNotif`='0' WHERE booker='$finalNotifVal' And status='Approved' And hideNotif='1'";

if (mysql_query($update_status)) {?>
<script>
	alert("UPDATE STATUS");
</script>

     <?php
} else {?>
    <script>alert("Error"); </script>
    <?php
}
}


 ?>