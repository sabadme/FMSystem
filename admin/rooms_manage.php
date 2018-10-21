<div class="manage-container room-management">
    <div class="top-container">
        <strong>ROOM</strong>
        
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
                <?php include "admin/rooms.php"; ?> 
                <li>
                    <span>ADD ROOM</span>
                </li>   
                <?php include "admin/add_roomAccount.php"; ?>
                <li>
                    <span>ROOM EQUIPMENT</span>
                </li>
                <?php include "admin/add_room_equipment.php"; ?>
                <li>
                    <span>DESIGNATE ROOM</span>
                </li>
                <?php include "admin/setTeachersRoom_design.php"; ?>

            
            </ul>
        </div>
    </div>

</div>

<!-- <script>
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
</script> -->