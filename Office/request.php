<div class="manage-container">
	<div class="top-container">
        <strong class="title">Request Page</strong>
        <div class="notifs-container">
            <strong class="notifs"></strong>
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
	

	<div class="manage-inner-container">
		<form class="manage-form" action="" method="POST">
			<textarea placeholder="Message*" name="messagetype"></textarea>
			<button type="submit" name="send_request">Send </button>
		</form>
		<div class="table-container" id="wrapper">
			
				<table id="myTable">
				<thead>
					<th>Message</th>
					<th>Date</th>
					<th>Time</th>
					<th>Status</th>
				</thead>
				<tbody>
					<?php include"Office/office_SA_table.php"; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

