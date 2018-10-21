<?php 
if(isset($_REQUEST['viewCommentReport'])){

$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password);
mysql_select_db($db);

$viewCommentReport = $_REQUEST['viewCommentReport'];

$sqlAccount = mysql_query("SELECT * FROM tbl_login WHERE id='$viewCommentReport'");
$dataAccount = mysql_fetch_array($sqlAccount);



?>

<div class="report-container">
	<div class="top-container">
	    <strong><?php echo $dataAccount['account']; ?></strong>

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
	<?php 
	$sql_ReportEquipment = mysql_query("SELECT DISTINCT equipment_id,technician_id FROM report WHERE report_id='$viewCommentReport'");
	while($data_ReportEquipment = mysql_fetch_array($sql_ReportEquipment)){
		$equipment_id = $data_ReportEquipment['equipment_id'];
		$technicianID = $data_ReportEquipment['technician_id'];

		

		$sql_booking = mysql_query("SELECT * FROM booking WHERE equipment = '$equipment_id'");
		$data_booking = mysql_fetch_array($sql_booking);
		$bookingEquipment = $data_booking['equipment'];


		if($equipment_id == $bookingEquipment){
			$roomName = $data_booking['venue'];

			$sql_Equipment = mysql_query("SELECT * FROM equipment WHERE id='$equipment_id'");
		$data_Equipment = mysql_fetch_array($sql_Equipment);
		$equipmentName = $data_Equipment['equipment_name'];
		$equipmentCode = $data_Equipment['equipment_code'];

		}else{
		$sql_Equipment = mysql_query("SELECT * FROM equipment WHERE id='$equipment_id'");
		$data_Equipment = mysql_fetch_array($sql_Equipment);
		$equipmentName = $data_Equipment['equipment_name'];
		$equipmentCode = $data_Equipment['equipment_code'];

		$sqlRooms_Assigned = mysql_query("SELECT * FROM rooms_equipment WHERE equipment='$equipment_id'");
		$dataRooms_Assigned = mysql_fetch_array($sqlRooms_Assigned);
		$roomName = $dataRooms_Assigned['room'];

		}

		$sql_rooms = mysql_query("SELECT * FROM rooms WHERE room='$roomName'");
		$data_rooms = mysql_fetch_array($sql_rooms);
		$roomName_check = $data_rooms['room'];
		$building = $data_rooms['building'];
			$floor = $data_rooms['floor'];

			if($roomName_check == $roomName	){
				$building = $data_rooms['building'];
			$floor = $data_rooms['floor'];
		}else{
			$sql_account = mysql_query("SELECT * FROM tbl_login WHERE account='$roomName'");
			$data_account = mysql_fetch_array($sql_account);
			$building = $data_account['building'];
			$floor = $data_account['floor'];

		}


	

		 $sql_Status = mysql_query("SELECT * FROM report ORDER BY id desc");
		 $dataStatus = mysql_fetch_array($sql_Status);
		 $Status = $dataStatus['Status'];

		 if($Status == "None"){
		 	$Status = "WALEY PA";

		 }else{
		 	$Status;
		 		
		 	}

		
		?>

		<div class="ReportBox">
		<div class="EQ-Page">
			<div class="EQ-Container">
				<div class="EQ-Img">
				<img src="images/lccb.png">
				</div>
			</div>
			<div class="EQ-Info">
				<span>Equipment name: <?php echo $equipmentName; ?></span>
				<span>Equipment code: <?php echo $equipmentCode; ?></span>
				<span>Assigned: <?php echo $roomName; ?> </span>
				<span>Building: <?php echo $building; ?></span>
				<span>Floor: <?php echo $floor; ?></span>
				<span>Status: <?php echo $Status; ?></span>
			</div>
		</div>
		<div class="message-container">
		<span class="viewbtn">View Reports <i class="fas fa-angle-down"></i></span><br>
		<div class="memo-container">
		<?php

		$sqlComment = mysql_query("SELECT * FROM report WHERE equipment_id='$equipment_id' And report_id='$viewCommentReport' And technician_id='$technicianID' ORDER BY id desc");
		while($dataComment = mysql_fetch_array($sqlComment)){
			$SentItemCheck = $dataComment['technician_sentitems'];


			if($SentItemCheck == "Not"){
				$userNames = $dataComment['report_id'];
				$commentDAte = $dataComment['report_date'];
				$commentTime = $dataComment['report_time'];
				$message = $dataComment['report_message'];

				$sqlReport_account = mysql_query("SELECT * FROM tbl_login WHERE id='$userNames'");
				$data_ReportAccount = mysql_fetch_array($sqlReport_account);
				?>
			<div class="Memo">
				<span class="name"><?php echo $data_ReportAccount['account']; ?></span>
				<span class="message"><?php echo $message; ?></span>
				<span class="datetime"><?php echo $commentDAte; ?> | <?php echo $commentTime; ?></span>
			</div>
				<?php
			}else{
				$userNames = $dataComment['technician_id'];
				$commentDAte = $dataComment['report_date'];
				$commentTime = $dataComment['report_time'];
				$message = $dataComment['report_message'];

				$sqlReport_account = mysql_query("SELECT * FROM tbl_login WHERE id='$userNames'");
				$data_ReportAccount = mysql_fetch_array($sqlReport_account);
				
					?>
			<div class="Memo">
				<span class="name"><?php echo $data_ReportAccount['account']; ?></span>
				<span class="message"><?php echo $message; ?></span>
				<span class="datetime"><?php echo $commentDAte; ?> | <?php echo $commentTime; ?></span>
			</div>
			<?php

			}
		

		}
	?>
	</div>
	<form action="" method="POST">
	<select name="doneORnot">
		<option>Fixed</option>
		<option>Not Fixed</option>
	</select>
	<textarea class="textarea" name="commentTechnician"></textarea>
	<button name="technicianReportSend" type="submit" value="<?php echo $equipment_id; ?>">Send</button>
	</form>
	</div>
	</div>
	<?php


	}

	 ?>
		
	</div>


<?php

	
}
 ?>

