<?php 	
if(isset($_POST)){

$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password);
mysql_select_db($db);

	$RoomName = $_POST['RoomName'];
	$RoomBuilding = $_POST['RoomBuilding'];
	$RoomFloor = $_POST['RoomFloor'];
	$RoomsID = $_POST['RoomsID'];

if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}

$update_status="UPDATE rooms SET room='$RoomName',building='$RoomBuilding',floor='$RoomFloor' WHERE id='$RoomsID'";

if (mysql_query($update_status)) {?>
<script>
	alert("UPDATE STATUS");
</script>

     <?php
} else {?>
    <script>alert("Error"); </script>
    <?php
}
mysql_close($conn);

}

 ?>