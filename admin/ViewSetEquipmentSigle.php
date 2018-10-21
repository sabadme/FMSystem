<?php

	$ViewSetEquipmentSigle = $_REQUEST['ViewSetEquipmentSigle'];
    
    include"admin/connection.php";
?>
<div class="manage-container room-management with-banner">
    <strong class="title">ROOM     <?php echo $ViewSetEquipmentSigle; ?></strong>

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
                    	$sqlSet = mysql_query("SELECT * FROM equipmentset WHERE set_name='$ViewSetEquipmentSigle' And drop_equipment='1'");
                    	while($data_sqlSet = mysql_fetch_array($sqlSet)){
                    		 $EquipmentSigleID = $data_sqlSet['quipment_id'];

                    	$sqlEquipment =mysql_query("SELECT * FROM equipment WHERE id = '$EquipmentSigleID'");
                    	$data_Equipment = mysql_fetch_array($sqlEquipment);
                    	$img_filenames = $data_Equipment['equipment_filename'];
                    	$EquipmentNAmes = $data_Equipment['equipment_name'];
                    	$equipmentStatus = $data_Equipment['equipment_status'];
                    	$equipmentID= $data_Equipment['id'];

                    	?>
                    	   <tr>
			                    <td><?php echo "<img style='width: 50pximg_filenames; height: 50px' src='EquipmentPicture/" . $img_filenames . "'>" ?></td>
			                    <td><?php echo $EquipmentNAmes; ?></td>
			                    <td><?php echo $equipmentStatus; ?></td>
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
			                    
			                        <button class="action" name="updateEquipment" type="submit" value="<?php echo $equipmentID; ?>">Update</button>
			                         
			                          </form>
			                    </td>
                    	<?php
                    	}

                     ?>
                    </tr>
                </tbody>
            </table>
        </div>       
    </div>
</div>
<?php

 ?>