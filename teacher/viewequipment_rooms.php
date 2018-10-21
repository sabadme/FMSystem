<?php 
if(isset($_REQUEST['viewequipment_rooms'])){

	$viewequipment_rooms=$_REQUEST['viewequipment_rooms'];


  $servername = "localhost";
  $username = "root";
  $password = "";
  $db = "monitoringsystemdatabase";


  $conn = mysql_connect($servername, $username, $password);
  mysql_select_db($db);
 ?>

<div class="manage-container">
	<div class="top-container">
        <strong>ROOMS</strong>
        <span><?php echo $data_teacherName['account']; ?></span>

        <div class="notifs-container">
            <strong class="notifs" value="<?php echo $accountname; ?>" id="valueNotif"></strong>
            <span id="teacherBookingApproved" class="counter"></span>

            <div class="notifs-wrapper">
                <strong>Notifications</strong>

                <table id="myTable">
                    <thead>
                         <th>Venue</th>
                         <th>Date Start</th>
                         <th>Date End</th>
                    </thead>

                    <tbody>
                        <?php include"teacher/sbookingApproved.php"; ?>
                    </tbody>
                </table>

                <form action="" method="POST">
                    <button title="Notifications" name="notifs" type="submit">View All</button>
                </form>
            </div>

        </div>
        <a href="logout.php" class="logout"></a>
    </div>
	<strong class="title"><?php echo $viewequipment_rooms; ?></strong>

	<div class="manage-inner-container">
	
		<div class="table-container" id="wrapper">
			<div class="btndivstyle">
			<input type="text" class="search" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
			</div>
				<table id="myTable">
				<thead>
					<th>Equipment</th>
					<th>Name</th>
					<th>Date Start</th>
					<th>Date End</th>
					
				</thead>

				<tbody>
					<?php 

						$sql_roomEquip = mysql_query("SELECT * FROM rooms_equipment WHERE room='$viewequipment_rooms'");
						while($data_roomEquip = mysql_fetch_array($sql_roomEquip)){
						$equipment = $data_roomEquip['equipment'];
						$equipmentStatus = $data_roomEquip['set_status'];


						if($equipmentStatus=="None"){

							$sql_single = mysql_query("SELECT * FROM equipment WHERE id='$equipment'");
							$data_single = mysql_fetch_array($sql_single);
							 $equipmentPicture = $data_single['equipment_filename'];
							 $equipmentName = $data_single['equipment_name'];
							 $equipmentStart = $data_single['equipment_start'];
							 $equipmentEnd = $data_single['equipment_end'];

						}else{
							$sql_set = mysql_query("SELECT * FROM equipmentset WHERE quipment_id='$equipment'");
							$data_set = mysql_fetch_array($sql_set);

							 $equipmentPicture = $data_set['img_filename'];
							 $equipmentName = $data_set['set_name'];
							 $equipmentStart = $data_set['date'];
							  $equipmentEnd = "None";


						}

						?>
						<tr>
							 <td><?php echo "<img style='width: 150px;' src='EquipmentPicture/" . $equipmentPicture . "'>" ?></td>
							 <td><?php echo $equipmentName; ?></td>
							 <td><?php echo $equipmentStart; ?></td>
							 <td><?php echo $equipmentEnd; ?></td>
						</tr>
						<?php
					}
					 ?>

				</tbody>
			</table>
		</div>
	</div>
</div> 
<?php 
}
 ?>



