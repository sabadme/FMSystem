<?php 
if(isset($_POST)){
$teacherORstudent = $_POST['teacherORstudent'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$UserID = $_POST['UserID'];

$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password);
mysql_select_db($db);

$updateteacher="UPDATE tbl_login SET `firstname`='$fname',`middlename`='$mname',`lastname`='$lname',`Status`='$teacherORstudent' WHERE id='$UserID'";

if (mysql_query($updateteacher)) {?>
<script>
	alert("UPDATE STATUS");
</script>

     <?php
} else {?>
    <script>alert("Error"); </script>
    <?php
}
mysql_close($conn);


}

 ?>