<div class="booking-container">
    <div class="top-container">
        <strong>QR Code Library</strong>
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
    <div class="library-container">
        <div>
            <img src="images/testqr.png">
            <span>Equipment Name</span>
            <span>Equipment QR Code</span>
        </div>
        <div>
            <img src="images/testqr.png">
            <span>Equipment Name</span>
            <span>Equipment QR Code</span>
        </div>

    </div>
</div>