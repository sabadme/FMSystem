<?php 
if(isset($_REQUEST['booking'])){

include"admin/connection.php";
$check=mysql_query("SELECT * FROM booking WHERE notif='1'");
while($data_check=mysql_fetch_array($check)){
$notif=$data_check['notif'];

if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}

$notification="0";	

$update_status="UPDATE booking SET `notif`='$notification'";

if (mysql_query($update_status)) {?>


     <?php
} else {?>
    <script>alert("Error"); </script>
    <?php
}

}
mysql_close($conn);
}
 ?>
