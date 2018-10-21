<div class="booking-container">
	<div class="top-container">
        <strong>BOOKING CALENDAR</strong>
        <div class="notifs-container">
            <strong id="adminNotifHide" class="notifs"></strong>
            <span id="count" class="counter"></span>

            <div class="notifs-wrapper">
                <strong>Notifications</strong>

                <table id="myTable">
                    <thead>
                        <th>Name</th>
                        <th>Equipment</th>
                        <th>Message</th>
                    </thead>    

                    <tbody>
                        <?php include"admin/viewreport_table.php"; ?>
                    </tbody>
                </table>

                <form action="" method="POST">
                    <button title="Notifications" name="notifs" type="submit">View All</button>
                </form>
            </div>

        </div>
        <a href="logout.php" class="logout"></a>
    </div>

<div class="monthly" id="mycalendar"></div>
<script type="text/javascript" src="calendarbooking/js/jquery.js"></script>
<script type="text/javascript" src="calendarbooking/js/monthly.js"></script>

</div>

	
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
