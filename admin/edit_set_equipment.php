<?php  $edit_set_equipment=$_REQUEST['edit_set_equipment'];  ?>
	
<div class="manage-container registration">
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
    
	<strong class="title">Equipments Registration</strong>

    <div class="tabs-container">
      
        
<div class="form-container">
    <div class="inner-form-container">

        <form action="" method="POST" enctype="multipart/form-data">
            <input type="file" name="editsetimg"/>
          
            <input type="text" name="edit_set_name" value="<?php echo $edit_set_equipment; ?>">
           
            <button type="submit" name="edit_set_equipment_fucntion" value="<?php echo $edit_set_equipment; ?>">Update</button>
        </form>
        


        <div class="table-container" id="wrapper">
            <table id='myTable'>
                <thead>
                <th>Code</th>
                <th>Name</th>
                <th>Registered</th>
                <th>Expiration</th>
                </thead>

                <tbody>
             <?php include"admin/set_table.php"; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

      
    </div>
</div>
