<?php 
if(isset($_REQUEST['update_equipment'])){
    $update_equipment=$_REQUEST['update_equipment'];

include"admin/connection.php";

$select=mysql_query("SELECT * FROM equipment WHERE id='$update_equipment'");
$data_select=mysql_fetch_array($select);

 ?>
<?php 
include"admin/generate_code.php";
 ?>
<div class="equipments-container">
<div class="top-container">
        <strong>Single Equipments</strong>

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
                    <span>Name</span>
                    <input type="text" name="equipment_name" value="<?php echo $data_select['equipment_name'] ?>">
                    <span>Type</span>
                    <input type="text" name="equipmentType" value="<?php echo $data_select['equipmentType']; ?>">


                </div>
                <div class="user-box-input">
                    <span>Registration Date</span>
                    <input type="date" name="equipment_start" value="<?php echo $data_select['equipment_start'] ?>">
                    <span>Expiree Date</span>
                    <input type="date" name="equipment_end" value="<?php echo $data_select['equipment_end']; ?>">
                    <span>Upload Image</span>
                    <input type="file" name="imgs" class="file"/>
                </div>
            </div>
            <button class="addbtn" type="submit" name="update_equipment_single" value="<?php echo $data_select['id']; ?>">Update</button>
    </div>

        </form>
        

        <input type="text" class="search" id="myInput1"  placeholder="Search names..">

        <div class="table-container" id="wrapper">
            <table id='myTable'>
                <thead>
                <th>Code</th>
                <th>Name</th>
                <th>Registered</th>
                <th>Expiration</th>
                <th></th>
                </thead>

                <tbody>
                <?php include "admin/equipment_table.php"; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>


<script>
    $(document).ready(function(){
        $('.tabs li').click(function(){

            $(this).each(function(){
                $(this).addClass('active');

                if($(this).siblings().hasClass('active')) {
                    $(this).siblings().removeClass('active');
                }
            });
        });
    });

    function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
<?php 
}
 ?>