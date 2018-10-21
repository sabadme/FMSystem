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
		<td><?php echo "<img style='width: 50px; height: 50px' src='EquipmentPicture/" . $img . "'>" ?></td>
		<td><?php echo $data_viewset['setQr_code']; ?></td>
		<td><?php echo $data_dateTime['set_name']; ?></td>
		<td><?php echo $data_dateTime['assigned_unassigned'];?></td>
		<td><?php echo $data_dateTime['date']; ?></td>
		<td><?php echo $data_dateTime['time']; ?></td>
		<td><form action="" method="POST"><button type="submit" name="viewSetEquipment" value="<?php echo $set_name; ?>">View</button></form></td>
	</tr>
	<?php
}

 ?>