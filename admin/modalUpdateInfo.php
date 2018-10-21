<?php   

if(isset($_POST)){
	$roomID = $_POST['roomID'];

$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";

$output="";
$conn =mysql_connect($servername,$username,$password);
mysql_select_db($db);

$getRoomInfo = mysql_query("SELECT * FROM rooms WHERE id='$roomID'");
$dataRoom_Info = mysql_fetch_array($getRoomInfo); 
$output .='<input type="text" id="RoomName" value='.$dataRoom_Info['room'].'>
          <input type="text" id="RoomsBuilding" value='.$dataRoom_Info['building'].'>
          <input type="text" id="RoomFloor" value='.$dataRoom_Info['floor'].'>';
}



 ?>