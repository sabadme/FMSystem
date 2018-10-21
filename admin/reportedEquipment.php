<?php 
include"admin/connection.php";

?>
<table>
	<thead>
		<tr>
		<th></th>
		<th>Name</th>
		<th>Equipment Name</th>
		<th>Equipment Code</th>
		<th>Essential</th>
		<th></th>
		</tr>
	</thead>
	<tbody>
<?php
$sqlReport = mysql_query("SELECT DISTINCT equipment_id,report_id FROM report ORDER BY id desc");
while($dataReport = mysql_fetch_array($sqlReport)){
$userID = $dataReport['report_id'];
$equipmentID = $dataReport['equipment_id'];

$sql_userAccount = mysql_query("SELECT * FROM tbl_login WHERE id='$userID'");
$data_userAccount = mysql_fetch_array($sql_userAccount);
$userName = $data_userAccount['account'];
 
$sqlEquipment = mysql_query("SELECT * FROM equipment WHERE id='$equipmentID'");
$dataEquipment = mysql_fetch_array($sqlEquipment);
$equipmentName = $dataEquipment['equipment_name'];
$equipmentFilename = $dataEquipment['equipment_filename'];
$equipmentStatus = $dataEquipment['priority_status'];

if($equipmentStatus == "High Priority"){
	$equipmentStatus="Major";
}else {
	$equipmentStatus="Minor";
}

?>	
	
		<tr>
		<td><?php echo "<img style='width: 50px; height: 50px' src='EquipmentPicture/" . $equipmentFilename . "'>" ?></td>
		<td><?php echo $userName; ?></td>
		<td><?php echo $equipmentName; ?></td>
		<td><?php echo $dataEquipment['equipment_code']; ?></td>
		<td><?php echo $equipmentStatus;?></td>
		<td>
			<form action="" method="POST">	
				<button name="viewEquipmentReport" type="submit" value="<?php echo $userID; ?>">View</button>
			</form>
		</td>
		</tr>
	

<?php
}
?>
</tbody>
</table>
<?php
?>
