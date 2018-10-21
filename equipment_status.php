<?php 
if(isset($_REQUEST['assign'])){
	$assign=$_REQUEST['assign'];
	include"admin/connection.php";

	$get_status=mysql_query("SELECT * FROM equipment WHERE id='$assign'");
	$data_Status=mysql_fetch_array($get_status);

	$equipment_status=$data_Status['status'];


	
				$assign_status="Assigned";

				if (!$conn) {
				    die("Connection failed: " . mysql_connect_error());
				}

				$update_status="UPDATE equipment SET `status`='$assign_status' WHERE id='$assign'";

				if (mysql_query($update_status)) {?>

				     <script>alert("Record Successfully Added"); </script>
				     <?php
				} else {?>
				    <script>alert("Error"); </script>
				    <?php
				}
				mysql_close($conn);


	}/*else{
		


$assign_status="Unassigned";

if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}

$update_status="UPDATE equipment SET `status`='$assign_status' WHERE id='$assign'";

if (mysql_query($update_status)) {?>

     <script>alert("Record Successfully Added"); </script>
     <?php
} else {?>
    <script>alert("Error"); </script>
    <?php
}
mysql_close($conn);

	}*/








 ?>
