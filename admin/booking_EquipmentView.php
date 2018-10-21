 <?php 
if(isset($_REQUEST['equipmentBookingView'])){

     $equipmentBookingView = $_REQUEST['equipmentBookingView'];

             $servername ="localhost";
            $username="root";
            $password="";
            $db="monitoringsystemdatabase";



            $conn =mysql_connect($servername,$username,$password);
            mysql_select_db($db);

      $sql_booking = mysql_query("SELECT * FROM booking WHERE equipment='$equipmentBookingView'");
            $data_booking = mysql_fetch_array($sql_booking);
       
            $date_start = $data_booking['date_start'];
            $date_end = $data_booking['date_end'];
            $time_start = $data_booking['time_start'];
            $time_end = $data_booking['time_end'];
             $booker = $data_booking['booker'];

            $sql_userStatus = mysql_query("SELECT * FROM tbl_login WHERE account='$booker'");
            $data_userStatus = mysql_fetch_array($sql_userStatus);
            $userStatus = $data_userStatus['Status'];


    ?>

 <div class="booking-container">
        <div class="top-container">
    <strong><?php echo $booker; ?></strong>
    <?php 
    if($userStatus == "Office"){

     ?>
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
    <?php 
        }else if($userStatus == "Admin"){
            ?>
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
            <?php
        } else if ($userStatus == "Teacher"){
            ?>
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
            <?php
        }
     ?>
    <a href="logout.php" class="logout"></a>
</div>

    <div class="manage-inner-container">
    
        <div class="table-container" id="wrapper" style="padding-left: 0;">
            <div class="btndivstyle">
            <input type="text" class="search" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
            </div>
                <table id="myTable">
             <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Date Registered</th>
                    <th>Date Expired</th>
                    <th>Status</th>
                </tr>
            </thead>

                <tbody>
                     <?php 
   

          

            $sql_bookingCheck = mysql_query("SELECT * FROM booking WHERE booker='$booker' And date_start='$date_start' And date_end='$date_end' And time_start='$time_start'");
            while($data_bookingCheck = mysql_fetch_array($sql_bookingCheck)){
                 $equipmentBook = $data_bookingCheck['equipment'];
                 $equipmentTimeEnd = $data_bookingCheck['time_end'];
                 $equipmentStatus = $data_bookingCheck['equipmentStatus'];

             

                $sql_equipment = mysql_query("SELECT * FROM equipment WHERE id='$equipmentBook'");
                $data_equipment = mysql_fetch_array($sql_equipment);
                $equipmentBookingImg = $data_equipment['equipment_filename'];

                ?>
                   <tr>
                <td><?php echo "<img style='width: 50px; height: 50px' src='EquipmentPicture/".$equipmentBookingImg."'>" ?></td>
                <td><?php echo $data_equipment['equipment_name']; ?></td>
                <td><?php echo $data_equipment['equipment_code']; ?></td>
                <td><?php echo $data_equipment['equipment_start']; ?></td>
                <td><?php echo $data_equipment['equipment_end']; ?></td>
                <?php 
                    if($equipmentStatus == "Not"){
                        ?>
                          <form action="" method="POST">
                              <td><button name="returnEuipment" value="<?php echo $data_bookingCheck['equipment']; ?>">Return</button></td>
                          </form>
                        <?php
                    }else{
                        ?>
                        <td><?php echo $equipmentStatus; ?></td>
                        <?php
                    }
                 ?>
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
} else if(isset($_REQUEST['returnEuipment'])){

     $returnEuipment = $_REQUEST['returnEuipment'];

             $servername ="localhost";
            $username="root";
            $password="";
            $db="monitoringsystemdatabase";



            $conn =mysql_connect($servername,$username,$password);
            mysql_select_db($db);

    $sql_booking = mysql_query("SELECT * FROM booking WHERE equipment='$returnEuipment'");
            $data_booking = mysql_fetch_array($sql_booking);
       
            $date_start = $data_booking['date_start'];
            $date_end = $data_booking['date_end'];
            $time_start = $data_booking['time_start'];
            $time_end = $data_booking['time_end'];
             $booker = $data_booking['booker'];

            $sql_userStatus = mysql_query("SELECT * FROM tbl_login WHERE account='$booker'");
            $data_userStatus = mysql_fetch_array($sql_userStatus);
            $userStatus = $data_userStatus['Status'];

    ?>
     <div class="booking-container">
        <div class="top-container">
    <strong><?php echo $booker; ?></strong>
    <?php 
    if($userStatus == "Office"){

     ?>
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
    <?php 
        }else if($userStatus == "Admin"){
            ?>
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
            <?php
        } else if ($userStatus == "Teacher"){
            ?>
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
            <?php
        }
     ?>
    <a href="logout.php" class="logout"></a>
</div>

    <div class="manage-inner-container">
    
        <div class="table-container" id="wrapper" style="padding-left: 0;">
            <div class="btndivstyle">
            <input type="text" class="search" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
            </div>
                <table id="myTable">
             <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Date Registered</th>
                    <th>Date Expired</th>
                    <th>Status</th>
                </tr>
            </thead>

                <tbody>
                     <?php 
   

          

            $sql_bookingCheck = mysql_query("SELECT * FROM booking WHERE booker='$booker' And date_start='$date_start' And date_end='$date_end' And time_start='$time_start'");
            while($data_bookingCheck = mysql_fetch_array($sql_bookingCheck)){
                 $equipmentBook = $data_bookingCheck['equipment'];
                 $equipmentTimeEnd = $data_bookingCheck['time_end'];
                 $equipmentStatus = $data_bookingCheck['equipmentStatus'];

             

                $sql_equipment = mysql_query("SELECT * FROM equipment WHERE id='$equipmentBook'");
                $data_equipment = mysql_fetch_array($sql_equipment);
                $equipmentBookingImg = $data_equipment['equipment_filename'];

                ?>
                   <tr>
                <td><?php echo "<img style='width: 50px; height: 50px' src='EquipmentPicture/".$equipmentBookingImg."'>" ?></td>
                <td><?php echo $data_equipment['equipment_name']; ?></td>
                <td><?php echo $data_equipment['equipment_code']; ?></td>
                <td><?php echo $data_equipment['equipment_start']; ?></td>
                <td><?php echo $data_equipment['equipment_end']; ?></td>
                <?php 
                    if($equipmentStatus == "Not"){
                        ?>
                          <form action="" method="POST">
                              <td><button name="returnEuipment" value="<?php echo $data_bookingCheck['equipment']; ?>">Return</button></td>
                          </form>
                        <?php
                    }else{
                        ?>
                        <td><?php echo $equipmentStatus; ?></td>
                        <?php
                    }
                 ?>
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



