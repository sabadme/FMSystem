<?php 	
$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password);
mysql_select_db($db);

$sqlEquipment = mysql_query("SELECT * FROM equipment");
while($dataEquipment = mysql_fetch_array($sqlEquipment)){
	$equipmentID = $dataEquipment['id'];
	 $equipmentStatus = $dataEquipment['status'];

	$sqlRoomEquipment = mysql_query("SELECT * FROM rooms_equipment WHERE equipment='$equipmentID'");
	$dataRoomEquipment = mysql_fetch_array($sqlRoomEquipment);
	 $roomName = $dataRoomEquipment['room'];

	$sqlBooking = mysql_query("SELECT * FROM booking WHERE equipment='$equipmentID'");
	$dataBooking = mysql_fetch_array($sqlBooking);
	$equipmentBookingID = $dataBooking['equipment'];
	


	if($equipmentID == $equipmentBookingID){
		$roomName = $dataBooking['venue'];
	}else{
		$roomName = $dataRoomEquipment['room'];
	}

	$sqlRoom = mysql_query("SELECT * FROM rooms WHERE room='$roomName'");
	$dataRoom = mysql_fetch_array($sqlRoom);
	 $roomS = $dataRoom['room'];
	 $building = $dataRoom['building'];
	 $floor = $dataRoom['floor'];

	 if ($roomName == $roomS) {
	 	$roomS = $dataRoom['room'];
	 	$building = $dataRoom['building'];
	 $floor = $dataRoom['floor'];
	 }else{
	 	$sqlOffice = mysql_query("SELECT * FROM tbl_login WHERE account='$roomName'");
	 	$dataOffice = mysql_fetch_array($sqlOffice);
	 	$roomS = $dataOffice['account'];
	 	$building = $dataOffice['building'];
	 $floor = $dataOffice['floor'];
	 }

	?>
	<tr>	
		<td data-th="Name">
			<form action="" method="POST">
			<button type="submit" class="equipment-name" name="equipmentPage" value="<?php echo $dataEquipment['id']; ?>"><?php echo $dataEquipment['equipment_name']; ?></button>
			</form>
		</td>

		<td><?php echo $dataEquipment['equipment_code']; ?></td>
		<td data-th="Manufacturer">wala pa</td>
		<td data-th="Serial">wala pa</td>
		<!-- <td data-th="Name"><?php echo $dataEquipment['equipment_name']; ?></td> -->
		<td data-th="QR ID"><?php echo $dataEquipment['equipment_code']; ?></td>
	<!-- 	<td data-th="Manufacturer">wala pa</td>
		<td data-th="Serial">wala pa</td> -->
		<td data-th="Condition"><?php echo $dataEquipment['equipment_status']; ?></td>

		<?php 	
			if($equipmentStatus	== "Assigned"){
				?>
				<td data-th="Room"><?php echo $roomS; ?></td>
				<td data-th="Building"><?php echo $building ?></td>
				<td data-th="Floor"><?php echo $floor;?></td>
				<?php
			}else if($equipmentStatus == "Set"){
				$sqlSet = mysql_query("SELECT * FROM equipmentset WHERE assigned_unassigned='Assigned'");
				$dataSet = mysql_fetch_array($sqlSet);
				$equipmentSetName = $dataSet['set_name'];

				$sqlRoomset = mysql_query("SELECT * FROM rooms_equipment WHERE set_name='$equipmentSetName'");
				$dataRoomSet = mysql_fetch_array($sqlRoomset);
				$setRoomname = $dataRoomSet['room'];

				$sqlRoomsetAssigned = mysql_query("SELECT * FROM rooms WHERE room='$setRoomname'");
				$dataRoomsetAssigned = mysql_fetch_array($sqlRoomsetAssigned);
				?>
				<td data-th="Room"><?php echo $dataRoomsetAssigned['room']; ?></td>
				<td data-th="Building"><?php echo $dataRoomsetAssigned['building']; ?></td>
				<td data-th="Floor"><?php echo $dataRoomsetAssigned['floor']; ?></td>
				<?php

			}
			else{
				?>
				<td data-th="Room">None</td>
				<td data-th="Building">None</td>
				<td data-th="Floor">None</td>
				<?php
			}
		 ?>
		 <td>
		 	<form action="" method="POST">
		 		<select name="statusEquipment">
		 			<option>Up To Date</option>
		 			<option>Broken</option>
		 		</select>
		 </td>
		 <td>
		 		<button name="updateEquipmentstatus" type="submit" value="<?php echo $equipmentID; ?>">Update</button>
		 	</form>
		 </td>
	</tr>
	<?php


}		

 ?>		

 <script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>

<script>
  var slideIndex2 = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("imgimg");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none"; 
    }
    slideIndex2++;
    if (slideIndex2 > x.length) {slideIndex2 = 1} 
    x[slideIndex2-1].style.display = "block"; 
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>