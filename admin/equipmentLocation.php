<?php 
if(isset($_REQUEST['equipmentLocation'])){
	$equipmentData = $_REQUEST['equipmentData'];

	$id;
	include"admin/connection.php";	

	$sql_User = mysql_query("SELECT * FROM tbl_login WHERE id ='$id'");
	$dataUser = mysql_fetch_array($sql_User);
	$userStatus = $dataUser['Status'];

	


	$viewEquipment = mysql_query("SELECT * FROM equipment WHERE equipment_code = '$equipmentData'");
	$dataEquipment = mysql_fetch_array($viewEquipment);
	 $equipmentName = $dataEquipment['equipment_name'];
	 $image_filename = $dataEquipment['equipment_filename'];
	 $qrImg = $dataEquipment['equipment_code'];
	 $dateStart = $dataEquipment['equipment_start'];
	 $dateEnd = $dataEquipment['equipment_end'];
	 $equipmentStatus = $dataEquipment['status'];
	 $equipmentID = $dataEquipment['id'];
	 $carrier = $dataEquipment['carrier'];


	if($equipmentData == $qrImg){

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
			

			if($equipmentID == $equipmentBooking_ID){
			 	
			$sqlBooking_rooms = mysql_query("SELECT * FROM rooms WHERE room='$venue'");
			$data_sqlBooking_rooms = mysql_fetch_array($sqlBooking_rooms);
			$building = $data_sqlBooking_rooms['building'];
			$floor = $data_sqlBooking_rooms['floor'];

			?>
				<span>Room: <?php echo $venue;?> </span>
				<span>Building: <?php echo $building;?> </span>
				<span>Floor: <?php echo $floor;?> </span>
				<span>Type: <?php echo $carrier; ?></span>
			<?php

			}else{

			 if ($equipmentStatus == "Unassigned"){

			$sqlRoom = mysql_query("SELECT * FROM rooms_equipment WHERE equipment = '$equipmentID'");
			$dataRoom = mysql_fetch_array($sqlRoom);
			
			
			?>
			<span>Room: <?php echo"Unassigned";?> </span>
			<span>Building: <?php echo"Unassigned";?> </span>
			<span>Floor: <?php echo"Unassigned";?> </span>
			<span>Type: <?php echo $carrier; ?></span>
			<?php

			} else if($equipmentStatus == "Assigned") {
				$sql_Assiged = mysql_query("SELECT * FROM rooms_equipment WHERE equipment='$equipmentID'");
				$data_Assigned = mysql_fetch_array($sql_Assiged);
				$roomNames = $data_Assigned['room'];

				$sql_rooms = mysql_query("SELECT * FROM rooms WHERE room='$roomNames'");
				$data_rooms = mysql_fetch_array($sql_rooms);
				$building = $data_rooms['building'];  
				$floor = $data_rooms['floor'];
				?>
				<span>Room: <?php echo $roomNames;?> </span>
				<span>Building: <?php echo $building;?> </span>
				<span>Floor: <?php echo $floor;?> </span>
				<span>Type: <?php echo $carrier; ?></span>
				<?php
			} else if($equipmentStatus == "Set"){
				
				$sql_equipmentStatusSet = mysql_query("SELECT * FROM equipment WHERE status='$equipmentStatus' And id='$equipmentID'");
				$data_sql_equipmentStatusSet = mysql_fetch_array($sql_equipmentStatusSet);
				$setName = $data_sql_equipmentStatusSet['set_name'];

				$sqlSet = mysql_query("SELECT * FROM equipmentset WHERE set_name='$setName'");
				$data_set = mysql_fetch_array($sqlSet);
				$setStatus = $data_set['assigned_unassigned'];

				if($setStatus == "Assigned"){

					$sql_setRoom = mysql_query("SELECT * FROM rooms_equipment WHERE set_name='$setName'");
					$data_setRoom = mysql_fetch_array($sql_setRoom);
					$roomNames = $data_setRoom['room'];

					$sqlRoom = mysql_query("SELECT * FROM rooms WHERE room='$roomNames'");
					$dataRoom = mysql_fetch_array($sqlRoom);
					$roomNamesCheck = $dataRoom['room'];

					if($roomNames == $roomNamesCheck){	

					$building = $dataRoom['building'];
					$floor = $dataRoom['floor'];
							?>
							<span>Room: <?php echo $roomNames;?> </span>
							<span>Building: <?php echo $building;?> </span>
							<span>Floor: <?php echo $floor;?> </span>
							<span>Type: <?php echo $carrier; ?></span>
							<?php

					}else{
					 $sql_Office = mysql_query("SELECT * FROM tbl_login WHERE account='$roomNames'");
					 $data_Office = mysql_fetch_array($sql_Office);
					 $building = $data_Office['building'];
					 $floor = $data_Office['floor'];
							?>
							<span>Room: <?php echo $roomNames;?> </span>
							<span>Building: <?php echo $building;?> </span>
							<span>Floor: <?php echo $floor;?> </span>
							<span>Type: <?php echo $carrier; ?></span>
							<?php
					}


					
				}
				
			

			}
		}
			?>

		
		<span><?php echo "<img src='QRimg/" . $qrImg . ".png'>" ?></span>

		<span><i><?php echo $qrImg; ?></i></span>

		<?php 
			if($userStatus == "Admin"){

			}else{
				?>
				<form action="" method="POST">
					<button name="locationReport" type="submit" value="<?php echo $dataEquipment['id']; ?>">Report</button>
				</form>
				<?php
			}
		 ?>


		<span class="status"><?php echo $equipmentStatus; ?></span>

		</div>	
	</div>
</div>
<?php
}else{
	?>
	<script>
		alert("Unable to locate equipment.")
	</script>
	<?php
	include"admin/scanner.php";
}
}
?>