<div class="manage-container">
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
    <strong class="title">ADD EQUIPMENTS FOR SET</strong>

    <div class="inner-form-container">
    <div class="table-container" id="wrapper">
            <form action="" method="POST">
            <table>
                <thead>
                <th></th>
                <th>Code</th>
                <th>Name</th>
                <th>Registered</th>
                <th>Expiration</th>
                </thead>    

                <tbody>
            <?php include"admin/set_equipment_table.php"; ?>
                </tbody>
            </table>
            <button style="margin-top: 20px;" class="action" name="Add_equipment_set" type="submit">Add</button>
            </form>
        </div>
    </div>
</div>
