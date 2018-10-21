<?php 
if(isset($_REQUEST['updateEquipmentstatus'])){
	$updateEquipmentstatus = $_REQUEST['updateEquipmentstatus'];
	$statusEquipment = $_REQUEST['statusEquipment'];

	$date = date("Y-m-d");  
	$time = date("H:i:s");
	include"admin/connection.php";

		if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}


	$getEquipmentuser = mysql_query("SELECT * FROM booking WHERE equipment='$updateEquipmentstatus'");
	$data_getEquipmentuser = mysql_fetch_array($getEquipmentuser);
	$bookingEquipment = $data_getEquipmentuser['equipment'];

	if($updateEquipmentstatus == $bookingEquipment){
		$venue = $data_getEquipmentuser['venue'];
		$bookers =$data_getEquipmentuser['booker'];

		$sqlUsers = mysql_query("SELECT * FROM tbl_login WHERE account='$bookers'");
		$dataUsers = mysql_fetch_array($sqlUsers);
		$userEquipment = $dataUsers['id'];

		$sqlRoomIDBooking = mysql_query("SELECT * FROM rooms WHERE room='$venue'");
		$dataRoomIDBooking = mysql_fetch_array($sqlRoomIDBooking);
		$roomIDs = $dataRoomIDBooking['id'];

	}else{
		$sqlRoom = mysql_query("SELECT * FROM rooms_equipment WHERE equipment='$updateEquipmentstatus'");
		$dataRoom = mysql_fetch_array($sqlRoom);
		$venue = $dataRoom['room'];	

		$sqlRoomID = mysql_query("SELECT * FROM rooms WHERE room='$venue'");
		$dataRoomID = mysql_fetch_array($sqlRoomID);
		$roomIDs = $dataRoomID['id'];

		$teacherUsereEquipment = mysql_query("SELECT * FROM teachers_roomsset WHERE teachers_room='$venue'");
		$data_teacherUsereEquipment = mysql_fetch_array($teacherUsereEquipment);
		$userEquipment = $data_teacherUsereEquipment['techears_id'];
	}

	if($statusEquipment == "Broken"){


	$insert=mysql_query("INSERT INTO equipment_brokenExpire VALUES(0,'$updateEquipmentstatus','$userEquipment','$roomIDs','$date','$time','$statusEquipment')");
	if($insert){
	}else{
		echo"Error";
	}



$updateBroken="UPDATE equipment SET `equipment_status`='Broken' WHERE id='$updateEquipmentstatus'";

if (mysql_query($updateBroken)) {?>


     <?php
} else {?>
    <script>alert("Error"); </script>
    <?php
}


}else{
	$sqlSelectcheck = mysql_query("SELECT * FROM equipment_brokenExpire WHERE equipment_id ='$updateEquipmentstatus' ORDER BY id desc");
	$dataSelectcheck= mysql_fetch_array($sqlSelectcheck);
	$equipmentCheckID = $dataSelectcheck['equipment_id'];
	$equpmenCheckStatus = $dataSelectcheck['status'];

	if($equipmentCheckID == $updateEquipmentstatus && $equpmenCheckStatus == "Broken"){

	$inserts=mysql_query("INSERT INTO equipment_brokenExpire VALUES(0,'$updateEquipmentstatus','$userEquipment','$roomIDs','$date','$time','$statusEquipment')");
	if($inserts){
	}else{
		echo"Error";
	}


		$updateUptodate="UPDATE equipment SET `equipment_status`='Up To Date' WHERE id='$updateEquipmentstatus'";

		if (mysql_query($updateUptodate)) {?>


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