<?php 
if(isset($_REQUEST['Add_equipment_set'])){
	include"admin/connection.php";

if(isset($_REQUEST['equipment_check'])){
	 $equipment_check=$_REQUEST['equipment_check'];

	 for ($i=0; $i < count($equipment_check) ; $i++) { 
	 	 $check=$equipment_check[$i];
	 
	

	$get_equipment=mysql_query("SELECT * FROM equipment WHERE id='$check'");
	while($data_equipment=mysql_fetch_array($get_equipment)){
		$equipment_filename=$data_equipment['equipment_filename'];
		?>
		<tr>
			<td><?php echo "<img style='width: 50px; height: 50px' src='EquipmentPicture/" . $equipment_filename . "'>" ?></td>
			<td><?php echo $data_equipment['equipment_name']; ?></td>
			<td><input type="checkbox" name="finalset_equipment[]" value="<?php echo $data_equipment['id']; ?>"></td>
			
		</tr>
		<?php
	}
}
}

}
 ?>