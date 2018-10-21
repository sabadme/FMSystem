<?php 

if(isset($_REQUEST['save_booking'])){
if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}

if(isset($_REQUEST['equipment'])){
	 $equipment=$_REQUEST['equipment'];

	 for ($i=0; $i < count($equipment) ; $i++) { 
	 		 	 $equip=$equipment[$i];

$update_status="UPDATE equipment SET `status`='Assigned' WHERE id='$equip'";

if (mysql_query($update_status)) {?>
<script>
	alert("UPDATE STATUS");
</script>

     <?php
} else {?>
    <script>alert("Error"); </script>
    <?php
}
}
}

mysql_close($conn);
}
 ?>