<div class="accounts-container">
<div class="top-container">
        <strong>Users</strong>

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
		
		
			
		</form>
		<?php include"admin/userUpdate_modal.php"; ?>
		<input type="text" class="search" id="myInput1"  placeholder="Search names..">	
		<div class="table-container" id="wrapper">
			
				<table id="myTable1">
				<thead>
					<th>First Name</th>
					<th>Middle Name</th>
					<th>Last Name</th>
					<th>Position</th>
					<th>Status</th>
					<th></th>
                    <th></th>
                    <th></th>
				</thead>

				<tbody>
					<?php include"admin/user_table.php"; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	function searchTable() {
        $(".search").on("keyup", function() {
            var input, filter, table, tr, td, i;
        input = document.getElementById("myInput1");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable1");
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
    });
}

$(document).ready(function(){
	searchTable();
});
</script>
</div>