<?php 
include"admin/connection.php";



$sql_booking = mysql_query("SELECT * FROM booking WHERE booker='$accountname' ORDER BY id desc");
while($data_booking = mysql_fetch_array($sql_booking)){

	$timeStart = $data_booking['time_start'];
	$time_end = $data_booking['time_end'];

	//time start
    $timestampB = strtotime($timeStart);


//time end
     $timestampsB = strtotime($time_end);
?>
<tr>
	
	<td data-type="Venue"><?php echo $data_booking['venue']; ?></td>
	<td data-type="Date Start"><?php echo $data_booking['date_start']; ?>  <?php echo date("H:i:A", $timestampB); ?></td>
	<td data-type="Date End"><?php echo $data_booking['date_end']; ?>  <?php echo date("H:i:A", $timestampsB); ?></td>
	<td data-type="Status">Approved</td>
</tr>
<?php
}

 ?>