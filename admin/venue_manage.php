<div class="manage-container venue-container">
    <div class="top-container">
        <strong>Venue</strong>
        
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

    <div class="manage-inner-container">
        <div class="tabs-container">
            <ul class="tabs accounts">
                <li class="active">
                    <span>MANAGE</span>
                </li>
                <?php include "admin/venue.php"; ?> 
                <li>
                    <span>ADD Venue</span>
                </li>   
                <?php include "admin/add_venue.php"; ?>
                <li>
                    <span>Venue equipment</span>
                </li>
                <?php include "admin/venue_equipment.php"; ?>

            
            </ul>
        </div>
    </div>
</div>