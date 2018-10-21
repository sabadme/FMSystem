
<div class="manage-container room-management with-banner">
    <strong class="title">ROOMS</strong>

    <div class="manage-inner-container">
        <div class="tabs-container">

	 <table>
         <thead>
			<th>Teacher</th>
             <th>Rooms</th>
             <th>View</th>
		</thead>

         <tbody>
         	<?php 
            


      	include"admin/connection.php";


         		$select_teacher=mysql_query("SELECT * FROM tbl_login WHERE ED_status='Enabled' ORDER BY id desc");
         		while($data_teacher=mysql_fetch_array($select_teacher)){
         			$teacherId=$data_teacher['id'];


                    $getDAte=mysql_query("SELECT * FROM teachers_roosset WHERE techears_id='$teacherId'");
                    $dataDate=mysql_fetch_array($getDate);
         		
         		
         			?>
         			<tr>
         				<td><?php echo $data_teacher['account']; ?></td>
         				<td><select style="width: 50%;"><?php include"selected_roomsTeacher.php"; ?></select></td>
                  
         				<td>
         					<form action="" method="POST">
         					   <button class="action" name="UnassignedRooms" value="<?php echo $teacherId; ?>">View</button>
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
