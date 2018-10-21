<?php 
include"teacher/send_report.php";
include "teacher/teacherBooking_function.php";
include"teacher/bookingEquipmentUpdate.php";

if(isset($_REQUEST['dashboard'])){
	include"teacher/dashboard.php";
}else if(isset($_REQUEST['reports'])){
	include"teacher/report.php";
}else if(isset($_REQUEST['equipment_report'])){
	include"teacher/report_message.php";	
}else if(isset($_REQUEST['send_report'])){
	include"teacher/report.php";	
}else if(isset($_REQUEST['booking'])){
	include"teacher/booking_page.php";
}else if (isset($_REQUEST['save_booking'])){
	include"teacher/booking_page.php";		
}else if (isset($_REQUEST['equipment_page'])) {
    include "admin/product_page.php";
}else if (isset($_REQUEST['viewrooms'])) {
    include "teacher/viewrooms.php";
}else if (isset($_REQUEST['viewequipment_rooms'])) {
    include "teacher/viewequipment_rooms.php";
}else if (isset($_REQUEST['room_page'])) {
    include "teacher/room_pageEquipment.php";
}else if (isset($_REQUEST['openScanner'])) {
    include "teacher/scanner.php";
}else if (isset($_REQUEST['openCam'])) {
    include "teacher/openScanner.php";
}else if (isset($_REQUEST['closeCam'])) {
    include "teacher/scanner.php";
}else if (isset($_REQUEST['equipmentLocation'])) {
    include "admin/equipmentLocation.php";
}else if (isset($_REQUEST['equipmentBookingView'])) {
    include "admin/booking_EquipmentView.php";
}else if (isset($_REQUEST['viewEquipmentBooking'])) {
    include "Office/bookingVenue_page.php";
}else if (isset($_REQUEST['viewreportreply'])) {
    include "teacher/viewreportreply.php";
}else{
	include"teacher/dashboard.php";
}

 ?>
 