
 <?php 
if(isset($_REQUEST['unassigedTeachersRoom'])){

     $unassigedTeachersRoom=$_REQUEST['unassigedTeachersRoom'];

        include"admin/connection.php";

	     $sql_teachersName=mysql_query("SELECT * FROM tbl_login WHERE id='$unassigedTeachersRoom'");
	     $data_teachersName=mysql_fetch_array($sql_teachersName);


 ?> 
<div class="manage-container room-management with-banner">
    <strong class="title"><?php echo $data_teachersName['account']; ?></strong> 

    <div class="manage-inner-container">
        <div class="tabs-container">
           <div class="form-container">
    <div class="inner-form-container">

        <div class="table-container" id="wrapper">
            <input class="search" type="text" placeholder="Search rooms..." />

            <table>
                <thead>
                <th>Room</th>         
                <th></th>
                </thead>
                <tbody>
                <?php 

                $sql_teachersRooms=mysql_query("SELECT * FROM teachers_roomsset WHERE techears_id='$unassigedTeachersRoom' And set_unset='Unassigned'");
                while($data_teachersRooms=mysql_fetch_array($sql_teachersRooms)){
                	?>
                	<tr>
                		<td><?php echo $data_teachersRooms['teachers_room']; ?></td>
                		<td>
                			<form action="" method="POST">
                				<button class="action" name="Update_assigned" value="<?php echo $data_teachersRooms['id']; ?>">Assigned</button>
                			</form>
                		</td>
                	</tr>
                	<?php
                }
              
                 ?>
                
                </tbody>
            </table>
        </div>
    </div>
</div>
        </div>
    </div>

</div>
<?php 
    }
 ?>