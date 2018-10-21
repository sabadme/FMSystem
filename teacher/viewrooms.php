<?php 
if(isset($_REQUEST['viewrooms'])){
	echo $viewrooms=$_REQUEST['viewrooms']

 ?>

<div class="manage-container with-banner">
	<div class="top-container">
    <strong>ROOMS</strong>

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


	<div class="manage-inner-container">
	
		<div class="table-container" id="wrapper">
			<div class="btndivstyle">
			<input type="text" class="search" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
			</div>
				<table id="myTable">
				<thead>
					<th>Room</th>
				
					<th></th>
					
				</thead>

				<tbody>
<?php 

include"admin/connection.php";

$sql_rooms=mysql_query("SELECT * FROM teachers_roomsset WHERE techears_id='$viewrooms' And set_unset='Assigned'");
while($data_rooms=mysql_fetch_array($sql_rooms)){
$teacher_rooms=$data_rooms['teachers_room'];

$roomEquipment=mysql_query("SELECT * FROM rooms WHERE room='$teacher_rooms'");
$dataEquipment=mysql_fetch_array($roomEquipment);


	?>
	<tr>
		<td><?php echo $data_rooms['teachers_room']; ?></td>
		<td><form action="" method="POST"><button class="action" name="viewequipment_rooms" value="<?php echo  $data_rooms['teachers_room']; ?>">View</button></form></td>
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


