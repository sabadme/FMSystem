<?php 
if(isset($_REQUEST['officeupdate'])){

$officeids = $_REQUEST['officeids'];
$officename = $_REQUEST['officename'];

$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password);
mysql_select_db($db);

$updateteacher="UPDATE tbl_login SET `account`='$officename' WHERE id='$officeids'";

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