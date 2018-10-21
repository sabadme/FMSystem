<?php 
include"admin/connection.php";

$view_set=mysql_query("SELECT DISTINCT `set_name`,`setQr_code` FROM equipmentset ORDER BY id desc");
while($data_viewset=mysql_fetch_array($view_set)){
	

	$set_name=$data_viewset['set_name'];

	$get_timeAndDate=mysql_query("SELECT * FROM equipmentset WHERE set_name='$set_name'");
	$data_dateTime=mysql_fetch_array($get_timeAndDate);
	$img=$data_dateTime['img_filename'];





	?>
	<tr>
		<td data-th="Image"><?php echo "<img style='width: 150px;' src='EquipmentPicture/" . $img . "'>" ?></td>
		<td data-th="Set">
			<form action="" method="POST">
				<button class="equipment-name" title="" type="submit" name="viewSetEquipment" value="<?php echo $set_name; ?>"><?php echo $data_dateTime['set_name']; ?>
				</button>
			</form>
		</td>
		<td data-th="QR ID"><?php echo $data_viewset['setQr_code']; ?></td>		
		<td data-th="Status"><?php echo $data_dateTime['assigned_unassigned'];?></td>
		<td data-th="Registered"><?php echo $data_dateTime['date']; ?></td>
		<td data-th="Expiration"><?php echo $data_dateTime['time']; ?></td>
	</tr>
	<?php
}

 ?>
