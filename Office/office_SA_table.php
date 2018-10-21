<?php 

$accountname=$_SESSION['account'];

$servername ="localhost";
$username="root";
$password1="";	
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password1);
mysql_select_db($db);


$SA=mysql_query("SELECT * FROM tbl_login WHERE Under='$accountname'");
while($data_sa=mysql_fetch_array($SA)){

?>
<tr>
	<td><?php echo $data_sa['firstname']; ?></td>
	<td><?php echo $data_sa['lastname']; ?></td>
</tr>
<?php

}
?>