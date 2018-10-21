<!doctype html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=0">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset='utf-8'>
<head>
    <title>Monthly Booking</title>
	<link rel="stylesheet" href="calendarbooking/css/monthly.css">
	<style type="text/css">
		body {
			font-family: Calibri;
			background-color: #f0f0f0;
			padding: 0em 1em;
		}
		#mycalendar {
			width: 100%;
			margin: 2em auto 0 auto;
			max-width: 80em;
			border: 1px solid #666;
		}
	</style>
</head>
<body>
<h1>Monthly Booking</h1><br><br>
<div class="monthly" id="mycalendar"></div>
<script type="text/javascript" src="calendarbooking/js/jquery.js"></script>
<script type="text/javascript" src="calendarbooking/js/monthly.js"></script>
	
<script type="text/javascript">


	var sampleEvents = {
	"monthly":
	 [

	<?php 

	$servername ="localhost";
	$username="root";
	$password="";
	$db="monitoringsystemdatabase";


	$conn =mysql_connect($servername,$username,$password);
	mysql_select_db($db);

	$sqlBooking = mysql_query("SELECT * FROM booking ORDER BY id desc");
	while($dataBooking = mysql_fetch_array($sqlBooking)){
		$booker = $dataBooking['booker'];
		$dateStart = $dataBooking['date_start'];
		$dataEnd = $dataBooking['date_end'];
		$timeStart = $dataBooking['time_start'];
		$timeEnd = $dataBooking['time_end'];

		//time start
    $timestamp = strtotime($timeStart);


//time end
     $timestamps = strtotime($timeEnd);
   
	?>
		{
		"name": "<?php echo $booker; ?>",
		"startdate": "<?php echo $dateStart; ?>",
		"enddate": "<?php echo $dataEnd; ?>",
		"starttime": "<?php echo date("H:i:A", $timestamp); ?>",
		"endtime": "<?php echo date("H:i:A", $timestamps); ?>",
		"color": "#99CCCC",	
		"url": ""
		},
		<?php
		}
		 ?>
	]
	};


	$(window).load( function() {
		$('#mycalendar').monthly({
			mode: 'event',
			dataType: 'json',
			events: sampleEvents
		});
	});
</script>
</body></html>