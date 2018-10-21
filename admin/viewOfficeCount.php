
<div class="accounts-container">
<div class="top-container">
    <strong>Offices</strong>

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
	

		<input type="text" class="search" id="myInput2" placeholder="Search offices..">
		<div class="table-container" id="wrapper">
			<?php include"admin/office_updateModal.php"; ?>
				<table id="myTable2">
				<thead>

					<th>Offices</th>
					<th>Status</th>
					<th>E / D</th>
					<th>Add</th>
					<th>Equipments</th>
                    <th>Edit</th>
				</thead>	

				<tbody>
					<?php include"admin/office_table.php"; ?>
				</tbody>
			</table>
		</div>
	</div>

	<script>
	function searchTable() {
        $(".search").on("keyup", function() {
            var input, filter, table, tr, td, i;
        input = document.getElementById("myInput2");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable2");
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

</div>