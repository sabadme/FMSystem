<?php 
if(isset($_REQUEST['add_venue_function'])){

	$file=$_FILES['imgs'];
	$name=$_FILES['imgs'] ['name'];
	$size=$_FILES['imgs'] ['size'];	
	$type=$_FILES['imgs'] ['type'];
	$error=$_FILES['imgs'] ['error'];
	$tmp=$_FILES['imgs'] ['tmp_name'];
	
	if ($error > 0) {
		die("Error uploading File! Code $error.");
	}
	if ($type=="video/avi") {
		die("That Format is not allowed!");
	}
	else{
		move_uploaded_file($tmp,"RoomPicture/".$name);
		
	}

	include"admin/connection.php";

	$venue=$_REQUEST['venue'];
	$Building=$_REQUEST['Building'];	
	$floor=$_REQUEST['floor'];

	$insert=mysql_query("INSERT INTO rooms VALUES(0,'$venue','$Building','$floor','$name','Venue')");
		if($insert){
			
			?> <script> 
		 alert("Record Successfully Added in UserSubmit table"); </script>
		 <?php 
		}else {
		  echo "Error adding record"; 
		}

}


 ?>