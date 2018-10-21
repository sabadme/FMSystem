<?php 
if(isset($_REQUEST['view_roomSet'])){

	include"admin/connection.php";
	$view_roomSet=$_REQUEST['view_roomSet'];

	?>
	<div class="manage-container room-management with-banner">
    <strong class="title">ROOM     <?php echo $view_roomSet; ?></strong>

    <input class="search" type="text" placeholder="search room..." />
    <div class="manage-inner-container">
 
        <div class="table-container" id="wrapper">
            <table>
                <thead>
                <th></th>
                <th>Equipment</th>
                <th></th>
                </thead>

                <tbody>  
            		<?php 
            		$sql_roomset = mysql_query("SELECT * FROM rooms_equipment WHERE room = '$view_roomSet' And set_status='Set'");
            		while($data_Roomset = mysql_fetch_array($sql_roomset)){
            			$equipmentID = $data_Roomset['equipment'];

            
            			$sql_Set = mysql_query("SELECT * FROM equipmentset WHERE id='$equipmentID'");
            			$dataSet = mysql_fetch_array($sql_Set);
            			$setName = $dataSet['set_name'];
            			$img_filenames= $dataSet['img_filename'];
            		?>
            		<tr>
            			  <td><?php echo "<img style='width: 50px; height: 50px' src='EquipmentPicture/" . $img_filenames . "'>" ?></td>
                    <td><?php echo $setName; ?></td>
                  
                <td>
                	<form action=""	method="POST">
                    
                        <button class="action" name="ViewSetEquipmentSigle" type="submit" value="<?php echo $setName; ?>">View</button>
                         
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
}

 ?>