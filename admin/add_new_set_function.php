<?php 
if(isset($_REQUEST['add_new_set_function'])){
	$add_new_set_function=$_REQUEST['add_new_set_function'];
	$date=date("Y-m-d");
	$time=date("H-i-s");

	include"admin/connection.php";

	$get_qr=mysql_query("SELECT * FROM equipmentset WHERE set_name='$add_new_set_function'");
	$data_qr=mysql_fetch_array($get_qr);
	$qr=$data_qr['setQr_code'];
	$equipment_filename=$data_qr['img_filename'];





	if(isset($_REQUEST['equipment_check'])){
	 $equipment_check=$_REQUEST['equipment_check'];

	 for ($i=0; $i < count($equipment_check) ; $i++) { 
	 	 $check=$equipment_check[$i];

	 

	 	 $insert=mysql_query("INSERT INTO equipmentset VALUES(0,'$add_new_set_function','$check','$date','$time','$qr','$equipment_filename','1','Unassigned')");
	 	 echo mysql_error();  
if($insert){
	
	?> 
 <?php 
}else {
  echo "Error adding record"; 
}

if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}

$update_status="UPDATE equipment SET `status`='Set' WHERE id='$check'";

if (mysql_query($update_status)) {?>


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