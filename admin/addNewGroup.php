
<?php   $addNewGroup = $_REQUEST['addNewGroup']; ?>
<div class="equipments-container">
    <div class="top-container">
        <strong>ADD NEW <?php echo $addNewGroup;  ?></strong>
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
        <div class="inner-form-container">
            <div class="box-container">

                <form action="" method="POST" enctype="multipart/form-data">

                    <div class="user-box">

                        <div class="user-box-input">
                            <span>Quantity</span>
                            <input type="text" name="numbersOfEquipemnt" placeholder="Quantity">
                           
                        </div>

                        <div class="user-box-input">
                            <span>Start Date</span>
                            <input type="date" name="equipment_start" required>
                            <span>Expiry Date</span>
                            <input type="date" name="equipment_end">

                        </div>
                    </div>
                    
                    <button type="submit" name="addNewGroupFunction" value="<?php echo $addNewGroup; ?>">SAVE</button>
                </form>

                
            </div>

        </div>
    </div>
</div>
