<?php 
include"admin/connection.php";

$sql_Assignedrooms = mysql_query("SELECT * FROM teachers_roomsset WHERE techears_id='$id' And set_unset = 'Assigned'");
while($data_Assignedrooms = mysql_fetch_array($sql_Assignedrooms)){
$teachers_room = $data_Assignedrooms['teachers_room'];

$sql_room = mysql_query("SELECT * FROM rooms WHERE room='$teachers_room'");
$data_rooms = mysql_fetch_array($sql_room);
$roomsPic = $data_rooms['img'];

?>
<tr>
    <td data-th="Image"><?php echo "<img style='width: 150px;' src='RoomPicture/".$roomsPic."'>" ?></td>
    <td data-th="Room Name">
		<form action="" method="POST">
		<button class="equipment-name" name="room_page" type="submit" value="<?php echo $teachers_room; ?>"><?php echo $data_rooms['building'];?>-<?php echo $data_rooms['room'];?>
		</button>
		</form>
	</td>
    <td data-th="Floor"><?php echo $data_rooms['floor'];?></td>
</tr>
<?php

}

 ?>