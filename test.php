<?php  if(isset($_REQUEST['unassign'])){

$unassign=$_REQUEST['unassign'];
include"admin/connection.php";

$assign_status="Unassigned";

if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}

$update_status="UPDATE equipment SET `status`='$assign_status' WHERE id='$unassign'";

if (mysql_query($update_status)) {?>

     <script>alert("Record Successfully Added"); </script>
     <?php
} else {?>
    <script>alert("Error"); </script>
    <?php
}
mysql_close($conn);
 }
  ?>
