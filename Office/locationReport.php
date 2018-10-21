<?php 
if(isset($_REQUEST['locationReport'])){
	$locationReport = $_REQUEST['locationReport'];
	$accountname;
	include"admin/connection.php";

	$sql_equipment = mysql_query("SELECT * FROM equipment WHERE id='$locationReport'");
	$data_equipment = mysql_fetch_array($sql_equipment);
	$image_filename = $data_equipment['equipment_filename'];
	$equipment_name = $data_equipment['equipment_name'];
	$qr_value = $data_equipment['equipment_code'];
	$equipmentStatus = $data_equipment['status'];
	$equipmentSetName = $data_equipment['set_name'];

	if($equipmentStatus == "Set"){
		$sql_setEquipment = mysql_query("SELECT * FROM equipmentset WHERE set_name='$equipmentSetName'");
		$data_SetEquipment = mysql_fetch_array($sql_setEquipment);
		$setStatus = $data_SetEquipment['assigned_unassigned'];
		$set_setName = $data_SetEquipment['set_name'];

		if($setStatus == "Assigned"){

			$sql_roomsEquipment = mysql_query("SELECT * FROM rooms_equipment WHERE set_name='$set_setName'");
			$data_roomsEquipment = mysql_fetch_array($sql_roomsEquipment);
			$equipmentSet_rooms = $data_roomsEquipment['room'];

		

				?>

	<div class="report-container">
        <div class="top-container">
    <strong>CREATE REPORT</strong>

    <div class="notifs-container">
        <strong class="notifs" value="<?php echo $accountname; ?>" id="OfficeBookingApproved"></strong>
        <span id="teacherBookingApproved" class="counter""></span>


        <div class="notifs-wrapper">
            <strong >Notifications</strong>

            <table id="myTable">
                <thead>
                        <th>Venue</th>
                        <th>Date Start</th>
                        <th>Date End</th>
                </thead>

                <tbody>
                    <?php include"Office/bookingApproved.php"; ?>
                </tbody>
            </table>

            <form action="" method="POST">
                <button title="Notifications" name="notifs" type="submit">View All</button>
            </form>
        </div>

    </div>
    <a href="logout.php" class="logout"></a>
</div>
        <div class="report-inner-container">

            <div class="image-container">
                <?php echo "<img src='EquipmentPicture/".$image_filename."'>" ?>
            </div>

            <div class="report-info-container">
                <span class="equipment-code"><b>Equipment QR/Code: </b><?php echo $qr_value; ?></span>
                <h1 class="equipment-name"><?php echo $equipment_name; ?></h1>
                 <span><b>Room: </b><?php echo $equipmentSet_rooms; ?></span>

                <form action="" method="POST">
                    <textarea placeholder="Status/Problem" name="messagereport"></textarea>
                    <button class="action" type="submit" name="send_report" value="<?php echo $data_equipment['id']; ?>">Send</button>
                </form>
            </div>

        </div>
    </div>

    <?php

		


		}
	} else if($equipmentStatus == "Assigned"){

			$sql_roomsEquipment = mysql_query("SELECT * FROM rooms_equipment WHERE equipment='$locationReport' And room='$accountname'");
			$data_roomsEquipment = mysql_fetch_array($sql_roomsEquipment);
			$equipmentSet_rooms = $data_roomsEquipment['room'];

		

		?>

	<div class="report-container">
        <div class="top-container">
    <strong>CREATE REPORT</strong>

    <div class="notifs-container">
        <strong class="notifs" value="<?php echo $accountname; ?>" id="OfficeBookingApproved"></strong>
        <span id="teacherBookingApproved" class="counter""></span>


        <div class="notifs-wrapper">
            <strong >Notifications</strong>

            <table id="myTable">
                <thead>
                        <th>Venue</th>
                        <th>Date Start</th>
                        <th>Date End</th>
                </thead>

                <tbody>
                    <?php include"Office/bookingApproved.php"; ?>
                </tbody>
            </table>

            <form action="" method="POST">
                <button title="Notifications" name="notifs" type="submit">View All</button>
            </form>
        </div>

    </div>
    <a href="logout.php" class="logout"></a>
</div>
        <div class="report-inner-container">

            <div class="image-container">
                <?php echo "<img src='EquipmentPicture/".$image_filename."'>" ?>
            </div>

            <div class="report-info-container">
                <span class="equipment-code"><b>Equipment QR/Code: </b><?php echo $qr_value; ?></span>
                <h1 class="equipment-name"><?php echo $equipment_name; ?></h1>
                 <span><b>Room: </b><?php echo $equipmentSet_rooms; ?></span>

                <form action="" method="POST">
                    <textarea placeholder="Status/Problem" name="messagereport"></textarea>
                    <button class="action" type="submit" name="send_report" value="<?php echo $locationReport; ?>">Send</button>
                </form>
            </div>

        </div>
    </div>

    <?php
	
	}

	


}

 ?>