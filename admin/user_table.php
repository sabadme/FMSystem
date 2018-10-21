<?php 

include"admin/connection.php";

$count = "0";
$user_table=mysql_query("SELECT * FROM tbl_login ORDER BY id desc");
while($data_table=mysql_fetch_array($user_table)){
	$count++;
	$firstname=$data_table['firstname'];
	 $status=$data_table['ED_status'];
	 $id=$data_table['id'];	

	if($firstname != "None" ){
		if($firstname != "null"){ 
?>
<tr>
<td data-th="First Name"><?php echo $data_table['firstname']; ?></td>
<td data-th="Middle Name"><?php echo $data_table['middlename'] ?></td>
<td data-th="Last Name"><?php echo $data_table['lastname']; ?></td>
<td data-th="Employment"><?php echo $data_table['Status']; ?></td>
<td data-th="Status"><?php echo $data_table['ED_status']; ?></td>
<?php 
if($status=="Enabled"){
 ?>
  <td  data-th="Action"><form action="" method="POST"><button class="action disable" name="disable" type="submit" value="<?php echo $id; ?>">Disable</button></form></td>
<?php 
}else{
	?>
	<td data-th="Action"><form action="" method="POST"><button class="action enable" name="enable" type="submit" value="<?php echo $id; ?>">Enable</button></form></td>

	<?php
}

 ?>
 <td data-th="Action"><button id="<?php echo $count; ?>" class="teacherUpdates" value="<?php echo $data_table['id']; ?>">Update</button></td>

 <td data-th="Action"><form action="" method="POST"><button name="teacherroom" class="action" value="<?php echo $data_table['id']; ?>">Room</button></form></td>
</tr>
<?php
}
}
}
 ?>

  <?php 	
  $count;
$scriptcount="0";
for (	$i=0; 	$i <$count ; 	$i++) { 
	 $scriptcount++;

	?>

<script>

	var modal = document.getElementById('myModal');

	var btn = document.getElementById(<?php echo $scriptcount; ?>);

	var close = document.getElementsByClassName("close")[0];

	$(btn).click(function(){
		$(modal).css('display', 'block');
	});

	$(close).click(function(){
		$(modal).css('display', 'none');
	});

	$(window).click(function(){
		if (event.target == modal) {
	        $(modal).css('display', 'none');
	    }
	});

</script>

<?php
}


  ?>


