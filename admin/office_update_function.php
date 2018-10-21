<?php 
if(isset($_REQUEST['office_update_function'])){
$office_update_function=$_REQUEST['office_update_function'];
$account=$_REQUEST['account'];

include"admin/connection.php";
$select=mysql_query("SELECT * FROM tbl_login WHERE id='$office_update_function'");
$data_select=mysql_fetch_array($select);
$edit_booker=$data_select['account'];

if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}

$update_status="UPDATE tbl_login SET `account`='$account' WHERE id='$office_update_function'";

if (mysql_query($update_status)) {?>
<script>
	alert("UPDATE STATUS");
</script>

     <?php
} else {?>
    <script>alert("Error"); </script>
    <?php
}



$update_statuss="UPDATE booking SET `booker`='$account' WHERE booker='$edit_booker'";

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


 