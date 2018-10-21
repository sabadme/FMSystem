<?php
$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password);
mysql_select_db($db);

$sql_officeName = mysql_query("SELECT * FROM tbl_login WHERE id='$id'");
$data_officeName = mysql_fetch_array($sql_officeName);

 ?>

<div class="dashboard-container">
        <div class="top-container">
    <strong>Dashboard</strong>
    <span><?php echo $data_officeName['account']; ?></span>
    <div class="notifs-container">
        <strong class="notifs" value="<?php echo $accountname; ?>" id="OfficeBookingApproved"></strong>
        <span id="teacherBookingApproved" class="counter""></span>

        <div class="notifs-wrapper">
            <strong >Notifications</strong>

            <table id="myTable">
                <thead>
                        <th data-type="Venue">Venue</th>
                        <th>Date Start</th>
                        <th>Date End</th>
                        <th>Status</th>
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


    <div class="new-equipments-container">
        <strong> My Booking </strong>
       
       <table id="myTable">
        <thead>
            <tr>
                <th></th>
                <th>Room</th>
                <th>Date Start</th>
                <th>Date End</th>
                <th>Equipment</th>
     
            </tr>
        </thead>
           <?php include"office/myBooking.php"; ?>
       </table>
        
    </div>
        <div class="new-equipments-container">
        <strong> My Equipments </strong>
       
       <table id="myTable">
        <thead>
            <tr>
                <th></th>
                <th>Equipment</th>
                <th>Code</th>
                <th>Registered Date</th>
                <th>Expiry Date</th>
                
     
            </tr>
        </thead>
           <?php include"office/office_equipment.php"; ?>
       </table>

            
        
    </div>
</div>


