<?php 
if(isset($_REQUEST['save_booking'])){

	/*$booker=$_REQUEST['booker'];*/
	$accountname;

	$venue=$_REQUEST['venue'];
	$sem=$_REQUEST['sem'];
	$datestart=$_REQUEST['datestart'];
	$dateend=$_REQUEST['dateend'];
	$timestart=$_REQUEST['timestart'];
	$tameend=$_REQUEST['tameend'];


include"admin/connection.php";



$check=mysql_query("SELECT * FROM booking");
$data_check=mysql_fetch_array($check);
$d_s=$data_check['date_start'];
$d_e=$data_check['date_end'];
$t_s=$data_check['time_start'];
$t_e=$data_check['time_end'];
$sem_db=$data_check['sem'];
$venue_db=$data_check['venue'];

if($timestart==$tameend){
	?>
	<script>
		alert("Time start  and time end are the same");
	</script>
	<?php
}else{

if($sem==$sem_db){
	if($venue_db==$venue){
if($datestart > $d_e && $dateend > $d_e){
if(isset($_REQUEST['equipment'])){
	 $equipment=$_REQUEST['equipment'];

	 for ($i=0; $i < count($equipment) ; $i++) { 
	 		 	 $equip=$equipment[$i];

	$insert=mysql_query("INSERT INTO booking VALUES(0,'$accountname','$venue','$sem','$datestart','$dateend','$timestart','$tameend','$equip','Pending','Not','0','1','0')");
	echo mysql_error();  
  if($insert){

	$sql_bookingID = mysql_query("SELECT * FROM booking ORDER BY id desc");
  	$data_bookingID = mysql_fetch_array($sql_bookingID);
  	$bookingID = $data_bookingID['id'];

	$insert_adminNotifBooking=mysql_query("INSERT INTO admin_notif VALUES(0,'None','None','None','$bookingID','$venue','$equip')");
	echo mysql_error();  
  if($insert_adminNotifBooking){	
	?>
 <?php 
}else {
  echo "Error adding record"; 
}

	
}else {
  echo "Error adding record"; 
}

//update equipment status




}
}else{
	$equip;
	$insert=mysql_query("INSERT INTO booking VALUES(0,'$accountname','$venue','$sem','$datestart','$dateend','$timestart','$tameend','$equip','Pending','Not','0','1','0')");
	echo mysql_error();  
  if($insert){

  	$sql_bookingID = mysql_query("SELECT * FROM booking ORDER BY id desc");
  	$data_bookingID = mysql_fetch_array($sql_bookingID);
  	$bookingID = $data_bookingID['id'];

	$insert_adminNotifBooking=mysql_query("INSERT INTO admin_notif VALUES(0,'None','None','None','$bookingID','$venue','$equip')");
	echo mysql_error();  
  if($insert_adminNotifBooking){	
	?>
 <?php 
}else {
  echo "Error adding record"; 
}
	
	?>
 <?php 
}else {
  echo "Error adding record"; 
}
}
}else if($datestart < $d_s &&  $dateend < $d_s){
	if(isset($_REQUEST['equipment'])){
	 $equipment=$_REQUEST['equipment'];

	 for ($i=0; $i < count($equipment) ; $i++) { 
	 		 	echo $equip=$equipment[$i];

	$insert=mysql_query("INSERT INTO booking VALUES(0,'$accountname','$venue','$sem','$datestart','$dateend','$timestart','$tameend','$equip','Pending','Not','0','1','0')");
	echo mysql_error();  
  if($insert){
	
	$sql_bookingID = mysql_query("SELECT * FROM booking ORDER BY id desc");
  	$data_bookingID = mysql_fetch_array($sql_bookingID);
  	$bookingID = $data_bookingID['id'];

	$insert_adminNotifBooking=mysql_query("INSERT INTO admin_notif VALUES(0,'None','None','None','$bookingID','$venue','$equip')");
	echo mysql_error();  
  if($insert_adminNotifBooking){	
	?>
 <?php 
}else {
  echo "Error adding record"; 
}

	?>
 <?php 
}else {
  echo "Error adding record"; 
}
}
}else{
	$equip;
	$insert=mysql_query("INSERT INTO booking VALUES(0,'$accountname','$venue','$sem','$datestart','$dateend','$timestart','$tameend','$equip','Pending','Not','0','1','0')");
	echo mysql_error();  
  if($insert){

  	$sql_bookingID = mysql_query("SELECT * FROM booking ORDER BY id desc");
  	$data_bookingID = mysql_fetch_array($sql_bookingID);
  	$bookingID = $data_bookingID['id'];

	$insert_adminNotifBooking=mysql_query("INSERT INTO admin_notif VALUES(0,'None','None','None','$bookingID','$venue','$equip')");
	echo mysql_error();  
  if($insert_adminNotifBooking){	
	?>
 <?php 
}else {
  echo "Error adding record"; 
}
	
	?>
 <?php 
}else {
  echo "Error adding record"; 
}
}
}else{
  if($timestart > $t_e && $tameend > $t_e){
  		if(isset($_REQUEST['equipment'])){
	 $equipment=$_REQUEST['equipment'];

	 for ($i=0; $i < count($equipment) ; $i++) { 
	 		 	echo $equip=$equipment[$i];

	$insert=mysql_query("INSERT INTO booking VALUES(0,'$accountname','$venue','$sem','$datestart','$dateend','$timestart','$tameend','$equip','Pending','Not','0','1','0')");
	echo mysql_error();  
  if($insert){

  	$sql_bookingID = mysql_query("SELECT * FROM booking ORDER BY id desc");
  	$data_bookingID = mysql_fetch_array($sql_bookingID);
  	$bookingID = $data_bookingID['id'];

	$insert_adminNotifBooking=mysql_query("INSERT INTO admin_notif VALUES(0,'None','None','None','$bookingID','$venue','$equip')");
	echo mysql_error();  
  if($insert_adminNotifBooking){	
	?>
 <?php 
}else {
  echo "Error adding record"; 
}
	
	?>
 <?php 
}else {
  echo "Error adding record"; 
}
}
}else{
	$equip;
	$insert=mysql_query("INSERT INTO booking VALUES(0,'$accountname','$venue','$sem','$datestart','$dateend','$timestart','$tameend','$equip','Pending','Not','0','1','0')");
	echo mysql_error();  
  if($insert){

  	$sql_bookingID = mysql_query("SELECT * FROM booking ORDER BY id desc");
  	$data_bookingID = mysql_fetch_array($sql_bookingID);
  	$bookingID = $data_bookingID['id'];

	$insert_adminNotifBooking=mysql_query("INSERT INTO admin_notif VALUES(0,'None','None','None','$bookingID','$venue','$equip')");
	echo mysql_error();  
  if($insert_adminNotifBooking){	
	?>
 <?php 
}else {
  echo "Error adding record"; 
}
	
	?>
 <?php 
}else {
  echo "Error adding record"; 
}
}
}else if($timestart < $t_s && $tameend < $t_s){
			if(isset($_REQUEST['equipment'])){
	 $equipment=$_REQUEST['equipment'];

	 for ($i=0; $i < count($equipment) ; $i++) { 
	 		 	echo $equip=$equipment[$i];

	$insert=mysql_query("INSERT INTO booking VALUES(0,'$accountname','$venue','$sem','$datestart','$dateend','$timestart','$tameend','$equip','Pending','Not','0','1','0')");
	echo mysql_error();  
  if($insert){

  	$sql_bookingID = mysql_query("SELECT * FROM booking ORDER BY id desc");
  	$data_bookingID = mysql_fetch_array($sql_bookingID);
  	$bookingID = $data_bookingID['id'];

	$insert_adminNotifBooking=mysql_query("INSERT INTO admin_notif VALUES(0,'None','None','None','$bookingID','$venue','$equip','0')");
	echo mysql_error();  
  if($insert_adminNotifBooking){	
	?>
 <?php 
}else {
  echo "Error adding record"; 
}
	
	?>
 <?php 
}else {
  echo "Error adding record"; 
}
}
}else{
	$equip;
	$insert=mysql_query("INSERT INTO booking VALUES(0,'$accountname','$venue','$sem','$datestart','$dateend','$timestart','$tameend','$equip','Pending','Not','0','1','0')");
	echo mysql_error();  
  if($insert){
  	$sql_bookingID = mysql_query("SELECT * FROM booking ORDER BY id desc");
  	$data_bookingID = mysql_fetch_array($sql_bookingID);
  	$bookingID = $data_bookingID['id'];

	$insert_adminNotifBooking=mysql_query("INSERT INTO admin_notif VALUES(0,'None','None','None','$bookingID','$venue','$equip')");
	echo mysql_error();  
  if($insert_adminNotifBooking){	
	?>
 <?php 
}else {
  echo "Error adding record"; 
}
	
	?>
 <?php 
}else {
  echo "Error adding record"; 
}
}
}else{
	?>
	<script>
		alert("Booking schedule is not available.");
	</script>
	<?php
}
}
//venue end
	}else{
			if(isset($_REQUEST['equipment'])){
	 $equipment=$_REQUEST['equipment'];

	 for ($i=0; $i < count($equipment) ; $i++) { 
	 		 	echo $equip=$equipment[$i];

	$insert=mysql_query("INSERT INTO booking VALUES(0,'$accountname','$venue','$sem','$datestart','$dateend','$timestart','$tameend','$equip','Pending','Not','0','1','0')");
	echo mysql_error();  
  if($insert){

  	$sql_bookingID = mysql_query("SELECT * FROM booking ORDER BY id desc");
  	$data_bookingID = mysql_fetch_array($sql_bookingID);
  	$bookingID = $data_bookingID['id'];

	$insert_adminNotifBooking=mysql_query("INSERT INTO admin_notif VALUES(0,'None','None','None','$bookingID','$venue','$equip')");
	echo mysql_error();  
  if($insert_adminNotifBooking){	
	?>
 <?php 
}else {
  echo "Error adding record"; 
}
	
	?>
 <?php 
}else {
  echo "Error adding record"; 
}
}
}else{
	$equip;
	$insert=mysql_query("INSERT INTO booking VALUES(0,'$accountname','$venue','$sem','$datestart','$dateend','$timestart','$tameend','$equip','Pending','Not','0','1','0')");
	echo mysql_error();  
  if($insert){
  	$sql_bookingID = mysql_query("SELECT * FROM booking ORDER BY id desc");
  	$data_bookingID = mysql_fetch_array($sql_bookingID);
  	$bookingID = $data_bookingID['id'];

	$insert_adminNotifBooking=mysql_query("INSERT INTO admin_notif VALUES(0,'None','None','None','$bookingID','$venue','$equip')");
	echo mysql_error();  
  if($insert_adminNotifBooking){	
	?>
 <?php 
}else {
  echo "Error adding record"; 
}
	
	?>
 <?php 
}else {
  echo "Error adding record"; 
}
}
	}

}else{
				if(isset($_REQUEST['equipment'])){
	 $equipment=$_REQUEST['equipment'];

	 for ($i=0; $i < count($equipment) ; $i++) { 
	 		 	echo $equip=$equipment[$i];

	$insert=mysql_query("INSERT INTO booking VALUES(0,'$accountname','$venue','$sem','$datestart','$dateend','$timestart','$tameend','$equip','Pending','Not','0','1','0')");
	echo mysql_error();  
  if($insert){
	$sql_bookingID = mysql_query("SELECT * FROM booking ORDER BY id desc");
  	$data_bookingID = mysql_fetch_array($sql_bookingID);
  	$bookingID = $data_bookingID['id'];

	$insert_adminNotifBooking=mysql_query("INSERT INTO admin_notif VALUES(0,'None','None','None','$bookingID','$venue','$equip','0')");
	echo mysql_error();  
  if($insert_adminNotifBooking){	
	?>
 <?php 
}else {
  echo "Error adding record"; 
}	
	?>
 <?php 
}else {
  echo "Error adding record"; 
}
}
}else{
	$equip;
	$insert=mysql_query("INSERT INTO booking VALUES(0,'$accountname','$venue','$sem','$datestart','$dateend','$timestart','$tameend','$equip','Pending','Not','0','1','0')");
	echo mysql_error();  
  if($insert){
	$sql_bookingID = mysql_query("SELECT * FROM booking ORDER BY id desc");
  	$data_bookingID = mysql_fetch_array($sql_bookingID);
  	$bookingID = $data_bookingID['id'];

	$insert_adminNotifBooking=mysql_query("INSERT INTO admin_notif VALUES(0,'None','None','None','$bookingID','$venue','$equip')");
	echo mysql_error();  
  if($insert_adminNotifBooking){	
	?>
 <?php 
}else {
  echo "Error adding record"; 
}	
	?>
 <?php 
}else {
  echo "Error adding record"; 
}
}
}
}

}

 ?>