<?php 	
include"admin/connection.php";

$sqlGroup_Equipment = mysql_query("SELECT * FROM equipment WHERE carrier = 'Group' And equipment_name='$viewGroupEquipment'");
while($dataGroup_equipment = mysql_fetch_array($sqlGroup_Equipment)){
	$img = $dataGroup_equipment['equipment_filename'];
?>
<tr>	
<td><?php echo "<img style='width: 50px; height: 50px' src='EquipmentPicture/" . $img . "'>" ?></td>
<td> <?php 	echo $dataGroup_equipment['equipment_code']; ?></td>
<td>
		<form action="" method="POST">
			<button class="equipment-name" title="<?php echo $dataGroup_equipment['equipment_name']; ?>" name="equipmentPage" value="<?php echo $dataGroup_equipment['id']; ?>"><?php echo $dataGroup_equipment['equipment_name']; ?></button>
		</form>
	</td>
<td><?php echo $dataGroup_equipment['status']; ?></td>
<td><?php echo $dataGroup_equipment['equipment_start']; ?></td>
<td><?php echo $dataGroup_equipment['equipment_end']; ?></td>
</tr>
<?php
}


 ?>