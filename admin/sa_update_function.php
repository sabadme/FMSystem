<?php 
if(isset($_REQUEST['sa_update_function'])){
	$sa_update_function=$_REQUEST['sa_update_function'];

$firstname=$_REQUEST['firstname'];
$lastname=$_REQUEST['lastname'];
$status=$_REQUEST['status'];
$middlename=$_REQUEST['middlename'];
$FL=$firstname.' '.$lastname;

include"admin/connection.php";

$select=mysql_query("SELECT * FROM tbl_login WHERE id='$sa_update_function'");
$data_select=mysql_fetch_array($select);
$account_name=$data_select['account'];


if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}

$update_status="UPDATE tbl_login SET `account`='$FL',`firstname`='$firstname',`middlename`='$middlename',`Status`='$status',`lastname`='$lastname' WHERE id='$sa_update_function'";

if (mysql_query($update_status)) {?>
<script>
	alert("UPDATE STATUS");
</script>

     <?php
} else {?>
    <script>alert("Error"); </script>
    <?php
}

$update_statuss="UPDATE booking SET `booker`='$FL' WHERE booker='$account_name'";

if (mysql_query($update_statuss)) {?>
<script>
	alert("UPDATE STATUS");
</script>

     <?php
} else {?>
    <script>alert("Error"); </script>
    <?php
}
}
 ?>