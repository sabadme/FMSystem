<?php 

include"Technician/reportSend.php";


if(isset($_REQUEST['report'])){
	include"Technician/report.php";
}else if(isset($_REQUEST['viewCommentReport'])){
	include"Technician/viewCommentReport.php";
}else if(isset($_REQUEST['openScanner'])){
	include"Technician/scanner.php";
}else if(isset($_REQUEST['openCam'])){
	include"Technician/openScanner.php";
}else if(isset($_REQUEST['closeCam'])){
	include"Technician/scanner.php";
}else{
	include"Technician/report.php";
}

 ?>