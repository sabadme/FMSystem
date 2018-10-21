<?php 	
if(isset($_REQUEST['submit'])){
	$file=$_FILES['uploadpic'];
	
	$name=$_FILES['uploadpic'] ['name'];
	$size=$_FILES['uploadpic'] ['size'];	
	$type=$_FILES['uploadpic'] ['type'];
	$error=$_FILES['uploadpic'] ['error'];
	$tmp=$_FILES['uploadpic'] ['tmp_name'];

	if ($error > 0) {
		die("Error uploading File! Code $error.");
	}
	if ($type=="video/avi") {
		die("That Format is not allowed!");
	}
	else{
		move_uploaded_file($tmp,"EquipmentPicture/".$name);
		
	}

$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password);
mysql_select_db($db); 

$upload=mysql_query("INSERT INTO equipment_picture VALUES(0,'$equipmentname','$name')");
echo mysql_error();  
if($upload){
?> 
<script> 
 alert("Record Successfully"); 
</script>
 <?php 
}
else 
{
  echo "Error adding record"; 
}

}
	
?>
<!DOCTYPE html>
<html>
<head>	
	<title></title>
</head>
<body>
<form action="" method="POST">
	<input type="file" name="uploadpic">
	<input type="text" name="equipmentname" placeholder="Equipment Name">
	<button name="submit">Submit</button>
</form>
</body>
</html>
