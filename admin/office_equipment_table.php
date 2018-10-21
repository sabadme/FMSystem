<?php 
if(isset($_REQUEST['office_equipment_table'])){

$office_equipment_table=$_REQUEST['office_equipment_table'];

include"admin/connection.php";


$room=mysql_query("SELECT * FROM rooms_equipment WHERE room='$office_equipment_table'");
$data_room=mysql_fetch_array($room);
$officename=$data_room['room'];

if($office_equipment_table == $officename){
 ?>

<div class="manage-container">
    <div class="top-container">
    <strong>Update <?php echo $officename; ?> Equipments</strong>

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

    <input class="search" type="text" placeholder="Search equipments..." />
    <div class="inner-form-container">
 
        <div class="table-container" id="wrapper">
            <table>
                <thead>
                <th></th>
                <th>Equipments</th>
                <th>Status</th>
                <th>Action</th>
                <th></th>
                </thead>

                <tbody>
                    
                       <?php 
                        $room_equipment=mysql_query("SELECT * FROM rooms_equipment WHERE room='$office_equipment_table' ORDER BY id desc");
                        while($data_roomE=mysql_fetch_array($room_equipment)){
                            $equipment=$data_roomE['equipment'];
                            $room_id=$data_roomE['id'];
                            $set_status=$data_roomE['set_status'];

                            if($set_status=="Set"){

                                // get set equipment id

                                $equipmentSet_id=mysql_query("SELECT * FROM equipmentset WHERE id='$equipment'");
                                $data_equipmentSet_id=mysql_fetch_array($equipmentSet_id);
                                $EquipmentName=$data_equipmentSet_id['set_name'];
                                $img_filenames=$data_equipmentSet_id['img_filename'];
                            }else{

                            $get_equipmentName=mysql_query("SELECT * FROM equipment WHERE id='$equipment'");
                            $data_equipmentName=mysql_fetch_array($get_equipmentName);
                            $EquipmentName=$data_equipmentName['equipment_name'];
                            $img_filenames=$data_equipmentName['equipment_filename'];
                            }

                    ?>
                       
                <tr>
                      <td><?php echo "<img style='width: 50px; height: 50px' src='EquipmentPicture/" . $img_filenames . "'>" ?></td>
                    <td><?php echo $EquipmentName; ?></td>
                    <td><?php echo $data_roomE['status']; ?></td>
                    <td>
                           <form action="" method="POST">
                        <select name="equipment_action">
                            <option value="" disabled selected>Please Select..</option>
                            <option>Up to date</option>
                            <option>Broken</option>
                            <option>Expired</option>
                            <option>Unassigned</option>
                        </select>
                </td>
                <td>
                    
                        <button class="action secondary" name="Update_roomStatus" type="submit" value="<?php echo $room_id; ?>">Update</button>
                         
                          </form>
                    </td>
               
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
}else{
    ?>
    <script>
        alert("No equipment available.");
    </script>
    <?php
    include"admin/add_office_design.php";
}
}
 ?>