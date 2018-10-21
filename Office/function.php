<?php 
include"Office/Add_user_function.php";

include "Office/officeBooking_function.php";
include "Office/request_function.php";
include "Office/send_report.php";

include"teacher/bookingEquipmentUpdate.php";

if (isset($_REQUEST['addSA'])) {
	include"Office/Add_user.php";
}else if(isset($_REQUEST['add_user_SA'])){
	include"Office/Add_user.php";
}else if(isset($_REQUEST['dashboard'])){
	include"office/dashboard.php";
}else if (isset($_REQUEST['booking'])){
	include"Office/booking_page.php";		
}else if (isset($_REQUEST['report'])){
	include"Office/officeReport.php";		
}else if (isset($_REQUEST['equipment_report'])){
	include"Office/report_page.php";			
}else if (isset($_REQUEST['send_report'])){
	include"Office/dashboard.php";		
}else if (isset($_REQUEST['save_booking'])){
	include"Office/booking_page.php";		
} else if (isset($_REQUEST['equipment_page'])) {
    include "Office/product_page.php";
}else if (isset($_REQUEST['request'])) {
	include "Office/request.php";
}else if (isset($_REQUEST['send_request'])) {
    include "Office/request.php";
}else if (isset($_REQUEST['openScanner'])) {
    include "Office/scanner.php";
}else if (isset($_REQUEST['openCam'])) {
    include "Office/openScanner.php";
}else if (isset($_REQUEST['closeCam'])) {
    include "Office/scanner.php";
}else if(isset($_REQUEST['viewEquipmentBooking'])){
	 include"Office/bookingVenue_page.php";
}else if(isset($_REQUEST['equipmentLocation'])){
	 include"admin/equipmentLocation.php";
}else if(isset($_REQUEST['locationReport'])){
	 include"Office/locationReport.php";
}else if(isset($_REQUEST['equipmentBookingView'])){
	 include"admin/booking_EquipmentView.php";
}else {
	include"office/dashboard.php";	
}
 ?>
