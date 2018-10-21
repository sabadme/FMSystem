<?php 

if(isset($_REQUEST['SaveSet_TeachersRoom'])){

$teacher=$_REQUEST['teacher'];

include"admin/connection.php";

	if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}

$date = date('m/d/Y h:i:s a', time());


if($teacher==""){
	?>
	<script>alert("Please input search name...");</script>
	<?php
}else{


$SELECT_teacherId=mysql_query("SELECT * FROM tbl_login WHERE account='$teacher'");
$data_teacherId=mysql_fetch_array($SELECT_teacherId);
$Id_teacher=$data_teacherId['id'];
$ED_status=$data_teacherId['ED_status'];
$teacherName = $data_teacherId['account'];

if($ED_status=="Disable"){
	?>
	 <script> 
 alert("User is disable"); </script>
	<?php
}else{

if(isset($_REQUEST['SelectedRoom'])){
	 $SelectedRoom=$_REQUEST['SelectedRoom'];

	 for ($i=0; $i < count($SelectedRoom) ; $i++) { 
	 	 $roomSelect=$SelectedRoom[$i];

$getRooms=mysql_query("SELECT * FROM teachers_roomsset WHERE techears_id='$Id_teacher'");
$data_getRooms=mysql_fetch_array($getRooms);
$roomSave=$data_getRooms['teachers_room'];
$set_unset = $data_getRooms['set_unset'];





if($roomSave==$roomSelect && $teacher == $teacherName && $set_unset == "Unassigned" ){
	$dataID = $data_getRooms['id'];
	$updateRoomset="UPDATE teachers_roomsset SET set_unset='Assigned',assigned_date='$date',unassigned_date='None' WHERE id='$dataID'";

if (mysql_query($updateRoomset)) {?>
<script>
	alert("UPDATE STATUS");
</script>

     <?php
} else {?>
    <script>alert("Error"); </script>
    <?php
}




}else if($roomSave==$roomSelect && $teacher == $teacherName && $set_unset == "Assigned" ){
   ?>
   <script>
   	alert("This room is assiged to this teacher");
   </script>
   <?php
}else{

$Insert_AssignRooms=mysql_query("INSERT INTO teachers_roomsset VALUES(0,'$Id_teacher','$roomSelect','Assigned','$date','None')");
echo mysql_error();  
if($Insert_AssignRooms){
	
	?> <script> 
 alert("Record Successfully Added"); </script>
 <?php 
}else {
  echo "Error adding record"; 
}
}

}
}else{
	?>
	<script>
		alert("Please check the room");
	</script>
	<?php
}
}
}
mysql_close($conn);
}

 ?>