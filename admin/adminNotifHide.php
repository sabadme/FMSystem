<?php 
if(isset($_POST)){


$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password);	
mysql_select_db($db);	

if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}

$update_status="UPDATE report SET `notif_count`='0' WHERE notif_count='1'";

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