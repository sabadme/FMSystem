<?php 
if(isset($_REQUEST['officeequipmentassign'])){

    $officeequipmentassign=$_REQUEST['officeequipmentassign'];

 ?>
<div class="manage-container">
    <div class="top-container">
    <strong>Add Equipments</strong>

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
  <form action="" method="POST">
    <div class="inner-form-container">
        <div class="table-container" id="wrapper">
            <table>
                <thead>
                    <th>Image</th>
                    <th>Name</th> 
                    <th>Code</th>
                    <th>Select</th>
                </thead>

                <tbody> 
                <?php
include"admin/connection.php";

                $equipment_sql=mysql_query("SELECT * FROM equipment ORDER BY id desc");
                while($data_equipment=mysql_fetch_array($equipment_sql)){
                    $status=$data_equipment['status'];
                    $id=$data_equipment['id'];
                    $get_equipmentcode=$data_equipment['equipment_filename'];


                    if($status=="Unassigned"){

                        ?>
                                <tr>
                                    <td><?php echo "<img style='width: 50px; height: 50px' src='EquipmentPicture/".$get_equipmentcode."'>" ?></td>
                                    <td><?php echo $data_equipment['equipment_name']; ?></td>
                                    <td><?php echo $data_equipment['equipment_code']; ?></td>
                                <td><input type="checkbox" value="<?php echo $data_equipment['id']; ?>" name="check_list[]"></td>  
                                </tr>
                       <?php

                    }
               
                
                
            }


            //equipment set view

             $select_set=mysql_query("SELECT DISTINCT set_name FROM equipment WHERE status='Set'");
                    while($data_set=mysql_fetch_array($select_set)){
                        $set_set_name=$data_set['set_name'];

                $select_Setname=mysql_query("SELECT DISTINCT set_name,img_filename FROM equipmentset WHERE set_name='$set_set_name' And assigned_unassigned='Unassigned'");
                        while($data_setname=mysql_fetch_array($select_Setname)){
                        $img_filenames=$data_setname['img_filename'];
                        $set_name=$data_setname['set_name'];

                        $equipmentset_Id=mysql_query("SELECT * FROM equipmentset WHERE set_name='$set_name'");
                        $data_equipmentID=mysql_fetch_array($equipmentset_Id);
                     
                       
 ?>
                            <tr>
                                <td><?php echo "<img style='width: 50px; height: 50px' src='EquipmentPicture/" . $img_filenames . "'>" ?></td>
                                <td><?php echo $data_setname['set_name']; ?></td>
                                <td>NOne</td>
                                <td><input type="checkbox" value="<?php echo $data_equipmentID['id']; ?>" name="check_list[]"></td>
                            </tr>
 <?php
                    

                       }
                    }

                ?>
                </tbody>
            </table>
            <button class="action" name="save_selected_equipment" type="submit" value="<?php echo $officeequipmentassign; ?>">Save</button>
        </div>
    </div>
  
        
    </form>
</div>
<?php 
}
 ?>
<!-- 
<script>
$(document).ready(function(){
    $('#s').click(function(){
        $.post('equipment_status.php',
            {name: $('.test').attr('id')},

            function(data){
                $('#msg').html(data);
            }
        );
    });
});
</script> -->
