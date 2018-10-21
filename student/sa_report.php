<!-- <?php //include "admin/modal.php"; ?> -->

<div class="manage-container with-banner">
	<strong class="title">REPORT FORM</strong>

	<div class="manage-inner-container">
	
		<div class="table-container" id="wrapper" style="padding-left: 0;">
			<div class="btndivstyle">
			<input type="text" class="search" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
			</div>
				<table id="myTable">
				<thead>
					<th>Equipment</th>
					<th>Equipment Name</th>
					<th>Equipment Code</th>
					<th>Report</th>
				</thead>

				<tbody>
					<?php include"Office/report_equipment_table.php"; ?>
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