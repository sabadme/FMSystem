<?php 
include"admin/connection.php";

?>
<div class="report-container">
	<div class="top-container">
        <strong>Reported Equipments</strong>
        <div class="notifs-container">
            <strong id="adminNotifHide" class="notifs"></strong>
            <span id="count" class="counter"></span>

            <div class="notifs-wrapper">
                <strong>Notifications</strong>

                <table id="myTable">
                    <thead>
                        <th>Name</th>
                        <th>Equipment</th>
                        <th>Message</th>
                    </thead>    

                    <tbody>
                        <?php include"admin/viewreport_table.php"; ?>
                    </tbody>
                </table>

                <form action="" method="POST">
                    <button title="Notifications" name="notifs" type="submit">View All</button>
                </form>
            </div>

        </div>
        <a href="logout.php" class="logout"></a>
	</div>
<table>
	<thead>
		<tr>
		<th>Image</th>
		<th>Name</th>
		<th>EQ Name</th>
		<th>EQ Code</th>
		<th>Priority</th>
		<th>Action</th>
		</tr>
	</thead>
	<tbody>
<?php
$sqlReport = mysql_query("SELECT DISTINCT equipment_id,report_id FROM report ORDER BY id desc");
while($dataReport = mysql_fetch_array($sqlReport)){
$userID = $dataReport['report_id'];
$equipmentID = $dataReport['equipment_id'];

$sql_userAccount = mysql_query("SELECT * FROM tbl_login WHERE id='$userID'");
$data_userAccount = mysql_fetch_array($sql_userAccount);
$userName = $data_userAccount['account'];
 
$sqlEquipment = mysql_query("SELECT * FROM equipment WHERE id='$equipmentID'");
$dataEquipment = mysql_fetch_array($sqlEquipment);
$equipmentName = $dataEquipment['equipment_name'];
$equipmentFilename = $dataEquipment['equipment_filename'];
$equipmentStatus = $dataEquipment['priority_status'];

if($equipmentStatus == "High Priority"){
	$equipmentStatus="Major";
}else {
	$equipmentStatus="Minor";
}

?>	
	
		<tr>
		<td data-th="Image"><?php echo "<img style='width: 100px;' src='EquipmentPicture/" . $equipmentFilename . "'>" ?></td>
		<td data-th="User"><?php echo $userName; ?></td>
		<td data-th="Equipment"><?php echo $equipmentName; ?></td>
		<td data-th="QR ID"><?php echo $dataEquipment['equipment_code']; ?></td>
		<td data-th="Priority"><?php echo $equipmentStatus;?></td>
		<td data-th="Action">
			<form action="" method="POST">	
				<button name="viewEquipmentReport" type="submit" value="<?php echo $userID; ?>">View</button>
			</form>
		</td>
		</tr>
	

<?php
}
?>
</tbody>
</table>
</div>
<?php
?>
