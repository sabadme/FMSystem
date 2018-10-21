<?php
$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password);
mysql_select_db($db);

$sql_teacherName = mysql_query("SELECT * FROM tbl_login WHERE id='$id'");
$data_teacherName = mysql_fetch_array($sql_teacherName);

 ?>
<div class="dashboard-container">
    <div class="top-container">
    <strong>Dashboard</strong>
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

	<div class="new-equipments-container">
	<strong> My Rooms </strong>
    <table id="myTable">
        <thead>
            <tr>
                <th>Image</th>
                <th>Room Name</th>
                <th>Floor</th>
                <th>Action</th>
            </tr>
        </thead>
       <?php include"teacher/rooms.php"; ?> 
    </table>

	</div>

<div class="new-equipments-container">
    
<?php include"teacher/modal_teacher.php"; ?>
    <strong> My Bookings </strong>
    <table id="myTable">
        <thead>
            <tr>
                <th>Image</th>
                <th>Venue</th>
                <th>Building</th>
                <th>Floor</th>
                <th>Status</th>
                <th>Equipment</th>
                
            </tr>
        </thead>
       <?php include"teacher/bookingVenue.php"; ?> 
    </table>

    </div>
</div>

