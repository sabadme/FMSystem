<?php 

$select=mysql_query("SELECT * FROM teachers_roomsset WHERE techears_id='$teacherId' And set_unset='Assigned'");
while($data_select=mysql_fetch_array($select)){
	?>
	<option><?php echo $data_select['teachers_room']; ?></option>
	<?php
}

 ?>