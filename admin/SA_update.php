<div class="form-container">
	<div class="inner-form-container">
		<form class="manage-form" action="" method="POST">
			<select name="status">
				<option value="" disabled selected>Please Select..</option>
				<option>Teacher</option>
				<option>Student Assistant</option>
			</select>
			<input type="text" name="firstname" value="<?php echo $data_users['firstname']; ?>">
			<input type="text" name="middlename" value="<?php echo $data_users['middlename']; ?>">
			<input type="text" name="lastname" value="<?php echo $data_users['lastname']; ?>">
			<button type="submit" name="sa_update_function" value="<?php echo $data_users['id']; ?>">Update</button>
		</form>
		<div class="table-container" id="wrapper">
			<div class="btndivstyle">
			<input type="text" class="search" id="myInput" onkeyup="myFunction()" placeholder="Search names..">
			</div>
				<table id="myTable">
				<thead>
					<th>FIRSTNAME</th>
					<th>MIDDLENAME</th>
					<th>LASTNAME</th>
					<th>Position</th>
					<th>Status</th>
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