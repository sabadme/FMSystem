<?php 
if(isset($_REQUEST['equipmentPage'])){
	$equipmentData = $_REQUEST['equipmentPage'];

	include"admin/connection.php";	


	$viewEquipment = mysql_query("SELECT * FROM equipment WHERE id = '$equipmentData'");
	$dataEquipment = mysql_fetch_array($viewEquipment);
	 $id = $dataEquipment['id'];
	 $equipmentName = $dataEquipment['equipment_name'];
	 $image_filename = $dataEquipment['equipment_filename'];
	 $qrImg = $dataEquipment['equipment_code'];
	 $dateStart = $dataEquipment['equipment_start'];
	  $dateEnd = $dataEquipment['equipment_end'];
	 $equipmentStatus = $dataEquipment['status'];
	 $equipmentID = $dataEquipment['id'];



	?>


<div class="equipments-container">
	<div class="top-container">
    <strong><?php echo $equipmentName; ?></strong>

    <div class="notifs-container">
        <strong id="adminNotifHide" class="notifs"></strong>
        <span id="count" class="counter"></span>

        <div class="notifs-wrapper">
            <strong>Notifications</strong>

            <table id="myTable">
                <thead>
                    <th>Name</th>
                    <th>Equipment</th>
                    <th>Message</th>
                </thead>    

                <tbody>
                    <?php include"admin/viewreport_table.php"; ?>
                </tbody>
            </table>

            <form action="" method="POST">
                <button title="Notifications" name="notifs" type="submit">View All</button>
            </form>
        </div>

    </div>
    <a href="logout.php" class="logout"></a>
</div>


	<div class="EQ-Page">
		<div class="EQ-Container">
			<div class="EQ-Img">
				<?php echo "<img src='EquipmentPicture/" . $image_filename . "'>" ?>
			</div>
			<div class="EQ-Date">
				<div>
					<i>Date Start</i>
					<span><?php echo $dateStart ?></span>
				</div>

				<div>
					<i>Date End</i>
					<span><?php echo $dateEnd ?></span>
				</div>
			</div>
		</div>

	<div class="EQ-Info">
		

			<?php

			$sql_booking = mysql_query("SELECT * FROM booking WHERE equipment='$equipmentID'");
			$data_booking = mysql_fetch_array($sql_booking);
			$equipmentBooking_ID = $data_booking['equipment'];
			$venue = $data_booking['venue'];
			echo "&nbsp&nbsp";

			if($equipmentID == $equipmentBooking_ID){
			echo $venue;	
			$sqlBooking_rooms = mysql_query("SELECT * FROM rooms WHERE room='$venue'");
			$data_sqlBooking_rooms = mysql_fetch_array($sqlBooking_rooms);
			$building = $data_sqlBooking_rooms['building'];
			$floor = $data_sqlBooking_rooms['floor'];

			}else{

			 if ($equipmentStatus == "Unassigned"){

		   $roomNames="None";
		   $building="None";
		   $floor="None";

			} else if($equipmentStatus == "Assigned") {
				$sql_Assiged = mysql_query("SELECT * FROM rooms_equipment WHERE equipment='$equipmentID'");
				$data_Assigned = mysql_fetch_array($sql_Assiged);
				$roomNames = $data_Assigned['room'];

				$sql_rooms = mysql_query("SELECT * FROM rooms WHERE room='$roomNames'");
				$data_rooms = mysql_fetch_array($sql_rooms);
				$building = $data_rooms['building'];  
				$floor = $data_rooms['floor'];
			}
		}
			?>
		<?php 

$start = new DateTime($dateStart);

$end = new DateTime($dateEnd);
 $max_year =$start->diff($end)->days;

date_default_timezone_set('Asia/Manila');
 $yearNow= date('Y-m-d');

 $YearNows = new DateTime($yearNow);


$yearuseStart = new DateTime($dateStart);
 $year_use = $yearuseStart->diff($YearNows)->days;

 $gaugeValue = (100 / $max_year) * $year_use;

		 ?>
		
		<meter value="<?php echo $gaugeValue; ?>" min="0" max="100">2 out of 10</meter>
		<span>Room: <?php echo $roomNames;?> </span>
		<span>Building: <?php echo $building;?> </span>
		<span>Floor: <?php echo $floor;?> </span>
		<span><?php echo "<img src='QRimg/" . $qrImg . ".png'>" ?></span>

		<span><i><?php echo $qrImg; ?></i></span>


		<span class="status"><?php echo $equipmentStatus; ?></span>

	</div>
	</div>
</div>
<?php
	
}
?>