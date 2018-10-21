
<?php 
$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password);
mysql_select_db($db);

$sqlNotif = mysql_query("SELECT * FROM admin_notif ORDER BY id desc");
while($data_sqlNotif = mysql_fetch_array($sqlNotif)){
	  $reportIDCheck = $data_sqlNotif['report_id'];

	  	if($reportIDCheck == "None"){
	  		  $bookingID = $data_sqlNotif['booking_id'];

	  		 $sqlBookingUser = mysql_query("SELECT * FROM booking WHERE id='$bookingID'");
	  		 $dataBookingUser = mysql_fetch_array($sqlBookingUser);
	  		  $booker = $dataBookingUser['booker'];

	  		 $sqlBookingID =mysql_query("SELECT * FROM admin_notif WHERE booking_id ='$bookingID'");
	  		 $data_BookingID = mysql_fetch_array($sqlBookingID);
	  		$bookingIDstatus = $data_BookingID['status'];
	  		$bookingIDequipment = $data_BookingID['booking_equipment'];
	  		$bookingIDvenue = $data_BookingID['booking_venue'];

	  		$sqlEquipment = mysql_query("SELECT * FROM equipment WHERE id='$bookingIDequipment'");
	  		$dataEquipment = mysql_fetch_array($sqlEquipment);
	  		$equipmentName = $dataEquipment['equipment_name'];

	  		?>
	  		<div><span><?php echo $booker; ?>
	  		<?php 
	  		if($bookingIDstatus == "Ended"){
	  			echo "booking";
	  		}
	  		 ?>

	  		 has 
	  		<?php 
	  		if($bookingIDstatus == "Booking"){
	  			echo "Booked";
	  		}else if($bookingIDstatus == "Return"){
	  			echo"returned";
	  		}else if($bookingIDstatus == "Ended"){
	  			echo "Ended";
	  		}
	  		 ?>		
	  		 <?php echo $equipmentName ?> 
	  		<?php 
	  		if($bookingIDstatus == "Return"){
	  			echo "from";
	  		}else{
	  			echo "in";
	  		}

	  		 ?>
	  		<?php echo $bookingIDvenue; ?></span></div>
	  		<?php
	  	}else{
	  		   $reportIDCheck = $data_sqlNotif['report_id'];

	  		  $sqlReportCheck = mysql_query("SELECT * FROM admin_notif WHERE report_id='$reportIDCheck'");
	  		  $dataReportCheck = mysql_fetch_array($sqlReportCheck);
	  		  $userReportId = $dataReportCheck['userreport_id'];
	  		  $userReportStatus = $dataReportCheck['status'];
	  		  $userReportEquipment = $dataReportCheck['equipment_reportID'];

	  		  $sqlUser = mysql_query("SELECT * FROM tbl_login WHERE id='$userReportId'");
	  		  $dataUser = mysql_fetch_array($sqlUser);
	  		  $userName = $dataUser['account'];

	  		  $sqlEquipment = mysql_query("SELECT * FROM equipment WHERE id='$userReportEquipment'");
	  		$dataEquipment = mysql_fetch_array($sqlEquipment);
	  		$equipmentName = $dataEquipment['equipment_name'];
	  		$prioroty_status = $dataEquipment['priority_status'];
	  		 

	  		  ?>
	  		  <div><span><?php echo $userName; ?>
	  		   <?php 
	  		   	if($userReportStatus == "Report"){
	  		   		echo "has";
	  		   	}else{
	  		   		echo "has";
	  		   	}	
	  		    ?>
	  		   <?php echo $userReportStatus; ?> 
	  		   <?php 
	  		   if($userReportStatus == "Resolved"){
	  		   	echo "an";
	  		   }else{
	  		   	echo "an";
	  		   }
	  		    ?>

	  		   <?php echo $prioroty_status; ?>
		  		<?php 
	  		   	if($userReportStatus == "Resolved"){
	  		   	echo "issue of";
	  		   }else{
	  		   	echo "issue of ";
	  		   }
	  		 ?>
	  		    <?php echo $equipmentName; ?> </span></div>
	  		  <?php
}
}

?>
<!-- an high priority issue on -->

