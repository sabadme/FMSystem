<?php 
if(isset($_REQUEST['approve_booking'])){

	$approve_booking=$_REQUEST['approve_booking'];

include"admin/connection.php";

	$get_info=mysql_query("SELECT * FROM booking WHERE id='$approve_booking'");
	$data_info=mysql_fetch_array($get_info);
	$booker=$data_info['booker'];
	$venue=$data_info['venue'];
	$sem=$data_info['sem'];
	$date_start=$data_info['date_start'];
	$date_end=$data_info['date_end'];
	$time_start=$data_info['time_start'];
	$time_end=$data_info['time_end'];


	$select=mysql_query("SELECT * FROM booking WHERE booker='$booker' And venue='$venue' And sem='$sem' And date_start='$date_start' And date_end='$date_end' And time_start='$time_start' And time_end='$time_end'");
	while($data_select=mysql_fetch_array($select)){
		$booker_selected=$data_select['booker'];
		$venue_selected=$data_select['venue'];
		$sem_selected=$data_select['sem'];
		$dateS_selected_=$data_select['date_start'];
		$dateE_selected=$data_select['date_end'];
		$timeS_selected=$data_select['time_start'];
		$timeE_selected=$data_select['time_end'];
		$approved="Approved";


if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}

$update_status="UPDATE booking SET `status`='$approved' WHERE booker='$booker_selected' And venue='$venue_selected' And sem='$sem_selected' And date_start='$dateS_selected_' And date_end='$dateE_selected' And time_start='$timeS_selected' And time_end='$timeE_selected'";

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
mysql_close($conn);

}

 ?>