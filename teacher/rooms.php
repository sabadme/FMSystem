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
    <td><?php echo "<img style='object-fit: contain; width: 150px;' src='RoomPicture/".$roomsPic."'>" ?></td>
    <td><?php echo $data_rooms['building'];?>-<?php echo $data_rooms['room'];?></td>
    <td><?php echo $data_rooms['floor'];?></td>
    <td><form action="" method="POST"><button name="room_page" type="submit" value="<?php echo $teachers_room; ?>">View</button></form></td>
</tr>
<?php

}

 ?>