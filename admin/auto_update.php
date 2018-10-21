<?php 
if(isset($_REQUEST['login'])){

	include"admin/connection.php";

	$get_date=mysql_query("SELECT * FROM equipment");
	while($data_date=mysql_fetch_array($get_date)){
		$date=$data_date['date_end'];
		$time=$data_date['time_end'];
		$date_time=$date.' '.$time;

	date_default_timezone_set('Asia/Manila');
		 $date = date('Y-m-d');
		 $time=date('h:i:s a');

		 if($date_time==$date){
if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}

$update_status="UPDATE equipment SET `equipment_status`='Expired' WHERE date_end='$date' And time_end='$time'";

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
	}
	mysql_close($conn);
}

 ?>