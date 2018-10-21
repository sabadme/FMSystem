<?php
$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password);
mysql_select_db($db);

$query=mysql_query("SELECT * FROM report WHERE report_notif='1' ORDER BY id desc");
$output = '';
while($row=mysql_fetch_array($query)){
$report_id=$row['report_id'];

$message_Name=mysql_query("SELECT * FROM tbl_login WHERE id='$report_id'");
$data_name=mysql_fetch_array($message_Name);
$id=$data_name['id'];

$output .= '
	<div class="alert alert_default" id="hide">
		<p>Firstname: <strong>'.$data_name['account'].'</strong><br>
		Message: <strong>'.$row['report_message'].'</strong></p>
	</div>
	';
}
 echo $output;
?>
