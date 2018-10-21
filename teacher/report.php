

<div class="report-container">

	<div class="top-container">
    <strong>My Equipments</strong>

    <div class="notifs-container">
        <strong class="notifs" value="<?php echo $accountname; ?>" id="valueNotif"></strong>
        <span id="teacherBookingApproved" class="counter"></span>

        <div class="notifs-wrapper">
            <strong>Notifications</strong>

            <table id="myTable">
                <thead>
 						<th>Venue</th>
                        <th>Date Start</th>
                        <th>Date End</th>
                </thead>

                <tbody>
                    <?php include"teacher/sbookingApproved.php"; ?>
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
	
		<div class="table-container" id="wrapper">
			<div class="btndivstyle">
			<input type="text" class="search" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
			</div>
				<table id="myTable">
				<thead>
					<th>Equipment</th>
					<th>Facilities</th>
					<th>Name</th>
					<th>Code</th>
					<th></th>
				</thead>

				<tbody>
					<?php include"teacher/report_table.php"; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- <script>
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