<div class="equipments-container">
    <div class="top-container">
        <strong>Group Equipments</strong>
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

                    <span>Upload</span>
                    <input type="file" name="imgs[]" multiple/>

                   
                    <div class="user-box">

                        <div class="user-box-input">
                            <span>Quantity</span>
                            <input type="text" name="numbersOfEquipemnt" placeholder="Quantity">
                            <span>Equipment Name</span>
                            <input type="text" name="equipment_name" placeholder="Equipment Name">
                            <span>Equipment Type</span>
                            <select name="equipmentType">
                                <option>EE</option>
                                <option>OF</option>
                            </select>

                             <div>
                    <input type="radio" name="highANDlow" value="High Priority"><span>High Priority</span></input>
                    <input type="radio" name="highANDlow" value="Low Priority"><span>Low Priority</span></input>
                    </div>
                    
                        </div>

                        <div class="user-box-input">
                            <span>Start Date</span>
                            <input type="date" name="equipment_start" required>
                            <span>Expiry Date</span>
                            <input type="date" name="equipment_end">

                        </div>
                    </div>
                    
                    <button type="submit" name="saveGroupEquipementSet">SAVE</button>
                </form>

                
            </div>
       


            <div class="table-container" id="wrapper">
                <table id='myTable'>
                    <thead>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Quantity</th>
                    <th>Registered</th>
                    <th>Expiration</th>
                    <th></th>
                    <th></th>
                    </thead>

                    <tbody>
                    <?php include "admin/groupTable.php"; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
