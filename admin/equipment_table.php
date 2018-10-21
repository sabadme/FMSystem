	<?php
include"admin/connection.php";

$equipment_sql=mysql_query("SELECT * FROM equipment WHERE carrier='Single' ORDER BY id desc");
while($data_equipment=mysql_fetch_array($equipment_sql)){
	?>
	<tr>

	
	<td data-th="Equipment">
		<form action="" method="POST">
			<button class="equipment-name" title="<?php echo $data_equipment['equipment_name']; ?>" name="equipmentPage" value="<?php echo $data_equipment['id']; ?>"><?php echo $data_equipment['equipment_name']; ?></button>
		</form>
	</td>
	<td data-th="QR Code"><?php echo $data_equipment['equipment_code']; ?></td>
	<td data-th="Status"><?php echo $data_equipment['status']; ?></td>
	<td data-th="Date Start"><?php echo $data_equipment['equipment_start']; ?></td	>
	<td data-th="Date End"><?php echo $data_equipment['equipment_end']; ?></td>
	<td data-th="Action"><form action="" method="POST"><button class="action" type="submit" name="update_equipment" value="<?php echo $data_equipment['id']; ?>">Update</button></form></td>
	</tr>
	<?php
}

?>