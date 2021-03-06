<?php
// Make the script run only if there is a page number posted to this script
if(isset($_POST['pn'])){
	$rpp = preg_replace('#[^0-9]#', '', $_POST['rpp']);
	$last = preg_replace('#[^0-9]#', '', $_POST['last']);
	$pn = preg_replace('#[^0-9]#', '', $_POST['pn']);
	// This makes sure the page number isn't below 1, or more than our $last page
	if ($pn < 1) { 
    	$pn = 1; 
	} else if ($pn > $last) { 
    	$pn = $last; 
	}
	// Connect to our database here
include"admin/connection.php";
	// This sets the range of rows to query for the chosen $pn
	$limit = 'LIMIT ' .($pn - 1) * $rpp .',' .$rpp;
	// This is your query again, it is for grabbing just one page worth of rows by applying $limit
	$sql =mysql_query("SELECT * FROM equipment ORDER BY id DESC $limit");
	
	$dataString = '';
	while($row = mysqli_fetch_array($sql)){
		$id = $row["id"];
		$equipment_code = $row["equipment_code"];
		$equipment_name = $row["equipment_name"];
		$equipment_name = $row["equipment_start"];
		$equipment_name = $row["equipment_end"];
		$equipment_name = $row["equipment_filename"];
		$itemdate = strftime("%b %d, %Y", strtotime($row["datemade"]));
		$dataString .= $id.'|'.$equipment_code.'|'.$equipment_name.'|'.$equipment_end.'||';
	}
	// Close your database connection
  
	// Echo the results back to Ajax
	echo $dataString;

}
?>