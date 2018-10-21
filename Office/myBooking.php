<?php 
include"admin/connection.php";

$sql_booking = mysql_query("SELECT * FROM booking WHERE booker='$accountname' And status='Approved'");
while($data_booking=mysql_fetch_array($sql_booking)){
$venue = $data_booking['venue'];
$timeStart = $data_booking['time_start'];
$timeEnd = $data_booking['time_end'];

//time start
    $timestamp = strtotime($timeStart);


//time end
     $timestamps = strtotime($timeEnd);


$sql_rooms = mysql_query("SELECT * FROM rooms WHERE room='$venue'");
$data_rooms = mysql_fetch_array($sql_rooms);
$roomImg = $data_rooms['img'];
?>
<tr>
	<td><?php echo "<img style='width: 50px; height: 50px' src='RoomPicture/".$roomImg."'>" ?></td>
	<td><?php echo $venue; ?></td>
	<td><?php echo $data_booking['date_start'] ?>  <?php echo date("H:i:A", $timestamp); ?></td>
	<td><?php echo $data_booking['date_end'] ?>    <?php echo date("H:i:A", $timestamps); ?></td>
	<td><form action="" method="POST"><button type="submit" name="viewEquipmentBooking" value="<?php echo $venue; ?>">View</button></form></td>
</tr>
<?php
}
 ?>
