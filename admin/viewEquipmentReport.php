<div class="report-container">
<?php 
$viewEquipmentReport = $_REQUEST['viewEquipmentReport'];

$sqlReport = mysql_query("SELECT * FROM report WHERE id='$viewEquipmentReport'");
$data_Report = mysql_fetch_array($sqlReport);
$reportID = $data_Report['report_id'];
$equipmentID = $data_Report['equipment_id'];
$technicianID = $data_Report['technician_id'];

$sqlReportCheck = mysql_query("SELECT DISTINCT report_id,equipment_id FROM report WHERE report_id='$reportID' And equipment_id='$equipmentID'");
while($dataReportCheck = mysql_fetch_array($sqlReportCheck)){

	$sqlEquipment = mysql_query("SELECT * FROM equipment WHERE id='$equipmentID'");
	$dataEquipment = mysql_fetch_array($sqlEquipment);
	$equipmentName = $dataEquipment['equipment_name'];
	$equipmentCode = $dataEquipment['equipment_code'];

	$sql_booking = mysql_query("SELECT * FROM booking WHERE equipment = '$equipmentID'");
		$data_booking = mysql_fetch_array($sql_booking);
		$bookingEquipment = $data_booking['equipment'];


		if($equipmentID == $bookingEquipment){
			$roomName = $data_booking['venue'];

			$sql_Equipment = mysql_query("SELECT * FROM equipment WHERE id='$equipmentID'");
		$data_Equipment = mysql_fetch_array($sql_Equipment);
		$equipmentName = $data_Equipment['equipment_name'];
		$equipmentCode = $data_Equipment['equipment_code'];

		}else{
		$sql_Equipment = mysql_query("SELECT * FROM equipment WHERE id='$equipmentID'");
		$data_Equipment = mysql_fetch_array($sql_Equipment);
		$equipmentName = $data_Equipment['equipment_name'];
		$equipmentCode = $data_Equipment['equipment_code'];

		$sqlRooms_Assigned = mysql_query("SELECT * FROM rooms_equipment WHERE equipment='$equipmentID'");
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

		$sqlComment = mysql_query("SELECT * FROM report WHERE equipment_id='$equipmentID' And report_id='$viewEquipmentReport' And technician_id='$technicianID' ORDER BY id desc");
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
	</div>
	</div>
<?php

}

 ?>
</div>