
<?php 
include"admin/connection.php";
 $uniqueID="0";
$sql_rooms=mysql_query("SELECT * FROM rooms WHERE roomORvenue='Venue' ORDER BY id desc");
while($data_rooms=mysql_fetch_array($sql_rooms)){
	$img_filenames=$data_rooms['img'];
	$uniqueID++;
	?>
	<tr>
		<td data-th="Image"><?php echo "<img style='width: 150px; src='RoomPicture/" . $img_filenames . "'>" ?></td>
		<td data-th="Room"><?php echo $data_rooms['room']; ?></td>
		<td data-th="Building"><?php echo $data_rooms['building']; ?></td>
		<td data-th="Floor"><?php echo $data_rooms['floor']; ?></td>
		<td data-th="Action"><button class="actions" value="<?php echo $data_rooms['id']; ?>" id="<?php echo $uniqueID; ?>">Update</button></td>
	</tr>
	<?php
}

 ?>
<?php 
$uniqueID;
$modalID="0";
for ($i=0; $i <$uniqueID ; $i++) { 
    $modalID++;
    ?>
    <script>

var modal = document.getElementById('myModal');

var btn = document.getElementById(<?php echo $modalID; ?>);

var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
    modal.style.display = "block";
}

span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
    <?php
}

 ?>