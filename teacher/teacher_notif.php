<?php 
$id;
$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password);
mysql_select_db($db);

$sqlNotif  = mysql_query("SELECT * FROM user_notif WHERE userID='$id'");
while($dataNotif=mysql_fetch_array($sqlNotif)){
$status = $dataNotif['status'];
$bookingID = $dataNotif['equipmentID'];


$booking =mysql_query("SELECT * FROM booking WHERE id='$bookingID'");
$dataBooking = mysql_fetch_array($booking);
$venue = $dataBooking['venue'];

	if($status == "Approved"){
		echo "Admin Approved Your Booking";
		echo $venue;

	}else if($status == "Cancel"){
		echo "Admin Cancel Your Booking";
		echo $venue;
	}else if($status == "Return"){
		$sqlReturn = mysql_query("SELECT * FROM booking WHERE id='$bookingID'");
		$dataReturn = mysql_fetch_array($sqlReturn);
		$equipmentReturn = $dataReturn['equipment'];

		$sqlEquipment = mysql_query("SELECT * FROM equipment WHERE id='$equipmentReturn'");
		$dataEquipment = mysql_fetch_array($sqlEquipment);
		$equipmentName = $dataEquipment['equipment_name'];

		echo "Admin has accept your";
		echo $equipmentName;
		echo "return";


	}else if($status == "Resolved"){

		$sqlResolved = mysql_query("SELECT * FROM equipment WHERE id='$bookingID'");
		$dataResolved = mysql_fetch_array($sqlResolved);
		$equipmentResolvedname = $dataResolved['equipment_name'];

		$sqlReport = mysql_query("SELECT * FROM report WHERE equipment_id ='$bookingID'");
		$dataReport = mysql_fetch_array($sqlReport);
		$techID = $dataReport['equipment_id'];

		$sqlTech = mysql_query("SELECT * FROM tbl_login WHERE id='$techID'");
		$dataTech = mysql_fetch_array($sqlTech);
		$techName = $dataTech['account'];

		echo "Your";
		echo $equipmentResolvedname;
		echo "Reported Has Resolved By technician";
		echo $techName;
	}
}

?>