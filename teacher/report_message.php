<?php 
if(isset($_REQUEST['equipment_report'])){
    $equipment_report=$_REQUEST['equipment_report'];

include"admin/connection.php";

    $sql_booking = mysql_query("SELECT * FROM booking WHERE equipment='$equipment_report'");
    $data_booking = mysql_fetch_array($sql_booking);
    $equipmentBooking_ID = $data_booking['equipment'];

    if($equipmentBooking_ID == $equipment_report){

        $sqlEquipment = mysql_query("SELECT * FROM equipment WHERE id='$equipmentBooking_ID'");
        $data_equipment = mysql_fetch_array($sqlEquipment);
        $image_filename = $data_equipment['equipment_filename'];
         $qr_value=$data_equipment['equipment_code'];
         $equipment_name=$data_equipment['equipment_name'];
         $room = $data_booking['venue'];

    }else{

    $get_equipmentName=mysql_query("SELECT * FROM rooms_equipment WHERE equipment='$equipment_report'");
    $data_equipmentName=mysql_fetch_array($get_equipmentName);
    $name=$data_equipmentName['equipment'];
    $room=$data_equipmentName['room'];
    $set_status=$data_equipmentName['set_status'];

    if($set_status=="Set"){

        $equipment_Set=mysql_query("SELECT * FROM equipmentset WHERE id='$name'");
        $dataEquipment_set=mysql_fetch_array($equipment_Set);
        $image_filename=$dataEquipment_set['img_filename'];
        $qr_value=$dataEquipment_set['setQr_code'];
        $equipment_name = $dataEquipment_set['set_name'];

    }else{

    $get_equipmentImage=mysql_query("SELECT * FROM equipment WHERE id='$name'");
    $data_EquipmentImage=mysql_fetch_array($get_equipmentImage);
    $image_filename=$data_EquipmentImage['equipment_filename'];
    $equipment_name=$data_EquipmentImage['equipment_name'];
    $qr_value=$data_EquipmentImage['equipment_code'];

    }
}





 ?>

<div class="report-container">
    <div class="top-container">
    <strong>REPORT FORM</strong>

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

       
        <div class="report-inner-container">

            <div class="image-container">
                <?php echo "<img src='EquipmentPicture/".$image_filename."'>" ?>
            </div>

            <div class="report-info-container">

                <span class="equipment-code"><b>Equipment QR/Code: </b><?php echo $qr_value; ?></span>

                <h1 class="equipment-name"><?php echo $equipment_name; ?></h1>
                
                 <span><b>Room: </b><?php echo $room; ?></span>

                <form action="" method="POST">   
                <select name="technician">
                    <?php   
                        $technician = mysql_query("SELECT * FROM tbl_login WHERE Status='Technician'");
                        while($data_technician = mysql_fetch_array($technician)){
                            ?>
                            <option><?php echo $data_technician['account']; ?></option>
                            <?php
                        }

                     ?>
                </select>   
                    <textarea placeholder="Status/Problem" name="messagereport"></textarea>
                    <button class="action" type="submit" name="send_report" value="<?php echo $equipment_report; ?>">Send</button>
                </form>
            </div>

        </div>
    </div>

<?php 
}
 ?>

 