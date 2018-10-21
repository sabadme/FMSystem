<table>
<thead>
	<tr>
		<th>Equipment Name</th>
		<th>User</th>
		<th>Room</th>
		<th>Date</th>
		<th>Time</th>
		<th>Status</th>
	</tr>
</thead>
<tbody>
<?php 
include"admin/connection.php";

$sqlView = mysql_query("SELECT * FROM equipment_brokenexpire ORDER BY id asc");
while($dataView = mysql_fetch_array($sqlView)){
	$equipmentID = $dataView['equipment_id'];
	$equipment_userID = $dataView['equipment_userID'];
	$roomID = $dataView['room_id'];
	$date = $dataView['date'];
	$time = $dataView['time'];
	$Status = $dataView['status'];

	$sqlEquipment = mysql_query("SELECT * FROM equipment WHERE id='$equipmentID'");
	$dataEquipment = mysql_fetch_array($sqlEquipment);
	$equipmentName = $dataEquipment['equipment_name'];




	?>
	<tr>
		<td><?php echo $equipmentName; ?></td>
		<?php 
		if($equipment_userID == ""){
			?>
			<td><?php echo"None"; ?></td>
			<?php
		}else{
		$sqlUserName = mysql_query("SELECT * FROM tbl_login WHERE id='$equipment_userID'");
		$dataUserName = mysql_fetch_array($sqlUserName);
		$userName = $dataUserName['account'];
			?>
		<td><?php echo $userName; ?></td>
			
			<?php
		}
		if($roomID == ""){
			?>
			<td><?php echo "None"; ?></td>
			<?php
		}else{
			$sqlRoomID = mysql_query("SELECT * FROM rooms WHERE id='$roomID'");
			$dataRoomID = mysql_fetch_array($sqlRoomID);
			$roomName = $dataRoomID['room'];
			?>
			<td><?php echo $roomName; ?></td>
			<?php
		}
		 ?>
		<td><?php echo $date; ?></td>
		<td><?php echo $time; ?></td>	
		<td><?php echo $Status; ?></td>	
	</tr>
	<?php
}

 ?>
 </tbody>
 </table>
