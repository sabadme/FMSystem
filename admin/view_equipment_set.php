<div class="equipments-container">
    <div class="top-container">
        <strong>Set Equipments</strong>
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

    <div class="form-container">
        <div class="set-container">
            <input type="text" class="search" id="myInput1"  placeholder="Search names..">

            <div class="table-container" id="wrapper">
                <table>
                    <thead>
                        <th></th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Registered</th>
                        <th>Expiration</th>
                        <th>Action</th>
                    </thead>

                <tbody>
                    <?php include"admin/set_table.php"; ?>
                    </tbody>
                </table>
            </div>

            <form action="" method="POST"  enctype="multipart/form-data">
                <button class="action" type="submit" name="addnewset">Add New</button>
            </form>
        </div>
    </div>
</div>

