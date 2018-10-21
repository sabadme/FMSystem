<?php 
if(isset($_REQUEST['submitChoice'])){
	$submitChoice = $_REQUEST['submitChoice'];
	$choice = $_REQUEST['choice'];

	if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}

$sqlBookingCheck = mysql_query("SELECT * FROM booking WHERE id='$submitChoice'");
$dataBookingCheck = mysql_fetch_array($sqlBookingCheck);
$statusCheck = $dataBookingCheck['status'];

if($statusCheck == "Pending"){

if($choice == "Cancel"){

	$update_status="UPDATE booking SET `status`='Cancel' WHERE id='$submitChoice'";

if (mysql_query($update_status)) {?>


     <?php
} else {?>
    <script>alert("Error"); </script>
    <?php
}

$sqlBooking = mysql_query("SELECT * FROM booking WHERE id='$submitChoice'");
$dataBooking = mysql_fetch_array($sqlBooking);
$venue = $dataBooking['venue'];
$booker = $dataBooking['booker'];

$sqlBookerID = mysql_query("SELECT * FROM tbl_login WHERE account='$booker'");
$dataBookerID = mysql_fetch_array($sqlBookerID);
$bookerID = $dataBookerID['id'];

 $insert=mysql_query("INSERT INTO user_notif VALUES(0,'$bookerID','1','Cancel')");
if($insert){
}else{
echo"Error";
}
}else if($choice == "Approved"){

	$sqlBooking = mysql_query("SELECT * FROM booking WHERE id='$submitChoice'");
$dataBooking = mysql_fetch_array($sqlBooking);
$venue = $dataBooking['venue'];

	$update_status="UPDATE booking SET `status`='Approved' WHERE id='$submitChoice'";

if (mysql_query($update_status)) {?>


     <?php
} else {?>
    <script>alert("Error"); </script>
    <?php
}

$sqlBooking = mysql_query("SELECT * FROM booking WHERE id='$submitChoice'");
$dataBooking = mysql_fetch_array($sqlBooking);
$venue = $dataBooking['venue'];
$booker = $dataBooking['booker'];

$sqlBookerID = mysql_query("SELECT * FROM tbl_login WHERE account='$booker'");
$dataBookerID = mysql_fetch_array($sqlBookerID);
$bookerID = $dataBookerID['id'];

 $insert=mysql_query("INSERT INTO user_notif VALUES(0,'$bookerID','1','Approved')");
if($insert){
}else{
echo"Error";
}




}


mysql_close($conn);
}else{
	?>
	<script>alert("This booking is already apporved");</script>
	<?php
}
}

 ?>