<?php 	
if(isset($_POST)){

$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password);
mysql_select_db($db);

	$VenueName = $_POST['VenueName'];
	$VenueBuilding = $_POST['VenueBuilding'];
	$VenueFloor = $_POST['VenueFloor'];
	$VenueID = $_POST['VenueID'];

if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}

$update_status="UPDATE rooms SET room='$VenueName',building='$VenueBuilding',floor='$VenueFloor' WHERE id='$VenueID'";

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