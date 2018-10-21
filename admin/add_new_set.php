<?php 
if(isset($_REQUEST['add_new_set'])){
    $add_new_set=$_REQUEST['add_new_set'];

 ?>
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
            <button name="add_new_set_function" type="submit" value="<?php echo $add_new_set; ?>">Add</button>
            </form>
        </div>
</div>
<?php 
}
 ?>
