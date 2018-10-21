<?php 
$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password);
mysql_select_db($db);

$sql_Booking = mysql_query("SELECT DISTINCT `booker`,`venue`,`date_start`,`date_end`,`time_start`,`time_end` FROM booking WHERE booker='$accountname' And status='Approved' ORDER by id desc");
while($data_booking=mysql_fetch_array($sql_Booking)){
 ?>
 <tr>
 	<td data-th="Venue"><?php echo $data_booking['venue']; ?></td>
 	<td data-th="Date Start"><?php echo $data_booking['date_start'] ?>  <?php echo $data_booking['time_start']; ?></td>
 	<td data-th="Date End"><?php echo $data_booking['date_end'] ?>  <?php echo $data_booking['time_end']; ?></td>
 </tr>
 <?php
}

 ?>