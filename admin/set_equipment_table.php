<?php 
include"admin/connection.php";


$sql_equipmentSet=mysql_query("SELECT * FROM equipment WHERE status='Unassigned' And equipment_status='Up To Date'");
while($data_equipmentSet=mysql_fetch_array($sql_equipmentSet)){
	 $equipment_filename=$data_equipmentSet['equipment_filename'];


	?>
	<tr>
	
	<td><?php echo "<img style='width: 50px; height: 50px' src='EquipmentPicture/" . $equipment_filename . "'>" ?></td>
	<td>
		<form action="" method="POST">
			<button class="equipment-name" title="<?php echo $data_equipmentSet['equipment_name']; ?>" name="equipmentPage"  value="<?php echo $data_equipmentSet['id']; ?>"><?php echo $data_equipmentSet['equipment_name']; ?></button>
		</form>
	</td>
	<td><?php echo $data_equipmentSet['equipment_start']; ?></td>
	<td><?php echo $data_equipmentSet['equipment_end']; ?></td>
	<td><input type="checkbox" name="equipment_check[]" value="<?php echo $data_equipmentSet['id'] ?>"></td>

	</tr>

	<?php
}
?>


