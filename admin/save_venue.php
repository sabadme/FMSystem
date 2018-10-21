<?php 	
if(isset($_REQUEST['save_venue'])){

$roomName=$_REQUEST['Rooms'];

include"admin/connection.php";



$uptodate="Up To Date";

if(isset($_REQUEST['check_list'])){
	 $check_list=$_REQUEST['check_list'];

	 for ($i=0; $i < count($check_list) ; $i++) { 
	 	 $check=$check_list[$i];

	 	 $select_status=mysql_query("SELECT * FROM equipmentset WHERE id='$check'");
	 	 $data_status=mysql_fetch_array($select_status);
	 	 	$id=$data_status['id'];
	 	 	$set_name=$data_status['set_name'];




	 	 	$sql_RoomsEquipment = mysql_query("SELECT * FROM rooms_equipment WHERE equipment='$check'");
	 	 	$data_RoomsEquipment = mysql_fetch_array($sql_RoomsEquipment);
	 	 	$RoomEquipment = $data_RoomsEquipment['equipment'];
	 	 	$Room=$data_RoomsEquipment['room'];

	 	 	 if($check==$id){
	 	 	       $equipment_status="Set";
	 	 	       $set_name=$data_status['set_name'];
	 	     }else{
	 	 	       $equipment_status="None";
	 	 	       $set_name=$data_status['set_name'];
	 	     }


			if (!$conn) {
			    die("Connection failed: " . mysql_connect_error());
			}

	 	 	if($check == $RoomEquipment && $roomName == $Room){

	 	 		 $update_status2="UPDATE rooms_equipment SET `status`='Up to date' WHERE equipment='$check' And room='$roomName'";

					if (mysql_query($update_status2)) {?>


					     <?php
					} else {?>
					    <script>alert("Error"); </script>
					    <?php
					}

	 	 	}else{
	 	 		$insert_room=mysql_query("INSERT INTO rooms_equipment VALUES(0,'$roomName','$check','$uptodate','$equipment_status','$set_name')");
				 echo mysql_error();  
			  if($insert_room){
					
				?>
			 <?php 
			}else {
			  echo "Error adding record"; 
			}




	 	 	}



	 	
	 



			

	 	 




	 	
$assign_status="Assigned";



	 	

 	 if($check==$id){

 	

 $update_status1="UPDATE equipmentset SET `assigned_unassigned`='$assign_status' WHERE set_name='$set_name'";

if (mysql_query($update_status1)) {?>


     <?php
} else {?>
    <script>alert("Error"); </script>
    <?php
}
	 	 	
	 	 }else{
$update_status="UPDATE equipment SET `status`='$assign_status' WHERE id='$check'";

if (mysql_query($update_status)) {?>


     <?php
} else {?>
    <script>alert("Error"); </script>
    <?php
}
	 	 }
		
	 
}
}
mysql_close($conn);
}
?>