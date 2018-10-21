<?php 

include"admin/connection.php";

$d = new DateTime();
 $dd =$d->format('Y-m-d');
   ?>
   <br>
     <?php
$t = new DateTime();
$tt= $t->format('H:i:A');


$sql_booking = mysql_query("SELECT DISTINCT booker,venue,sem,date_start,date_end,status,time_start,time_end FROM booking WHERE booker='$accountname'");
while($data_booking = mysql_fetch_array($sql_booking)){
	$bookingVenue = $data_booking['venue'];
	$time = $data_booking['time_start'];
    $time_e = $data_booking['time_end'];
    $dateStart = $data_booking['date_start'];
    $dateEnd = $data_booking['date_end'];

              //time start
      $timestamp = strtotime($time);



//time end
     $timestamps = strtotime($time_e);

           $timeStart = date("H:i:A", $timestamp);

      if($timeStart == "00:00:AM"){
         $timeStart="12:00:AM";
      }else{
        $timeStart;
      }



        $timeEnd = date("H:i:A", $timestamps);

      if($timeEnd == "00:00:AM"){
         $timeEnd="12:00:AM";
    }else{
         $timeEnd;
    } 

    


	$sql_venue = mysql_query("SELECT * FROM rooms WHERE room='$bookingVenue'");
	$data_venue = mysql_fetch_array($sql_venue);

	$building = $data_venue['building'];
	$floor = $data_venue['floor'];
	$venueImg = $data_venue['img'];

	if($dd < $dateEnd ){

	?>
	<tr>
		<td><?php echo "<img style='object-fit: contain; width: 150px;' src='RoomPicture/".$venueImg."'>" ?></td>
		<td><?php echo $bookingVenue; ?></td>
		<td><?php echo $building; ?></td>
		<td><?php echo $floor; ?></td>
		<td><?php echo $data_booking['status']; ?></td>
		<td><form action="" method="POST"><button type="submit" name="viewEquipmentBooking" value="<?php echo $bookingVenue; ?>">View</button></form></td>
		
	</tr>
	<?php
	}else if($dd < $dateEnd && $timeEnd > $tt){
		?>
	<tr>
		<td><?php echo "<img style='width: 50px; height: 50px' src='RoomPicture/".$venueImg."'>" ?></td>
		<td><?php echo $bookingVenue; ?></td>
		<td><?php echo $building; ?></td>
		<td><?php echo $floor; ?></td>
		<td><?php echo $data_booking['status']; ?></td>
		<td><form action="" method="POST"><button type="submit" name="viewEquipmentBooking" value="<?php echo $bookingVenue; ?>">View</button></form></td>
		
	</tr>
	<?php
	}
}


 ?>
