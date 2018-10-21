<?php 

include "admin/booking_function.php";
include "student/send_report.php";


	if (isset($_REQUEST['dashboard'])) {
    include "dashboard.php";
}else if(isset($_REQUEST['equipment_page'])){
	include "admin/product_page.php";
} else if (isset($_REQUEST['booking'])) {
    include "admin/booking_page.php";
}else if (isset($_REQUEST['save_booking'])) {
    include "admin/booking_page.php";
}else if (isset($_REQUEST['reports'])){
	include"student/saReport.php";		
}else if (isset($_REQUEST['equipment_report'])){
	include"student/modal.php";		
}else if (isset($_REQUEST['send_report'])){
	include"student/modal.php";		
}
else{
	include "dashboard.php";
}

 ?>