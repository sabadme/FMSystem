<?php 
if(isset($_REQUEST['view_roomE'])){

$view_roomE=$_REQUEST['view_roomE'];

include"admin/connection.php";


$rooms=mysql_query("SELECT * FROM rooms WHERE room='$view_roomE'");
$data_room=mysql_fetch_array($rooms);
$room_name=$data_room['room'];
 ?>
<div class="manage-container room-management with-banner">
    <strong class="title">ROOM     <?php echo $room_name; ?></strong>

    <input class="search" type="text" placeholder="search room..." />
    <div class="manage-inner-container">
 
        <div class="table-container" id="wrapper">
            <table>
                <thead>
                <th></th>
                <th>Equipment</th>
                <th>Status</th>
                <th>Action</th>
                <th></th>
                </thead>

                <tbody>
                    
                    <?php 
                        $room_equipment=mysql_query("SELECT * FROM rooms_equipment WHERE room='$view_roomE' ORDER BY id desc");
                        while($data_roomE=mysql_fetch_array($room_equipment)){
                            $equipment=$data_roomE['equipment'];
                            $room_id=$data_roomE['id'];
                            $set_status=$data_roomE['set_status'];
                              $equipmentStatus = $data_roomE['status'];    

           

                            $equipment_name=mysql_query("SELECT * FROM equipment WHERE id='$equipment'");
                            $data_name=mysql_fetch_array($equipment_name);
                            $img_filenames=$data_name['equipment_filename'];
                            $EquipmentNAmes = $data_name['equipment_name'];
                          
                          if($set_status == "Set"){

                          }else{

                             if($equipmentStatus == "Drop"){

                                }else{
                    ?>
                       
                <tr>
                   <td><?php echo "<img style='width: 50px; height: 50px' src='EquipmentPicture/" . $img_filenames . "'>" ?></td>
                    <td><?php echo $EquipmentNAmes; ?></td>
                    <td><?php echo $data_roomE['status']; ?></td>
                    <td>
                           <form action="" method="POST">
                        <select name="equipment_action">
                             
                            <option>Up to date</option>
                            <option>Broken</option>
                            <option>Expired</option>
                            <option>Unassigned</option>
                            <option>Drop</option>
                        </select>
                </td>
                <td>
                    
                        <button class="action" name="Update_roomStatus" type="submit" value="<?php echo $equipment; ?>">Update</button>
                         
                          </form>
                    </td>
               
                </tr>
                   
                  <?php 
              }
                  }
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