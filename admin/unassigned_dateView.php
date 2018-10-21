<?php 
if(isset($_REQUEST['unassgnedView'])){
     

        include"admin/connection.php";



 ?> 
<div class="manage-container room-management with-banner">
  <!--   <strong class="title"><?php echo $data_teachername['account']; ?></strong> -->

    <div class="manage-inner-container">
        <div class="tabs-container">
           <div class="form-container">
    <div class="inner-form-container">

        <div class="table-container" id="wrapper">
            <input class="search" type="text" placeholder="Search rooms..." />

            <table>
                <thead>
                <th>Room</th>
                <th>Unassigned</th>
                <th></th>
                </thead>
                <tbody>
                <?php 

                $unassignedId=mysql_query("SELECT DISTINCT `techears_id`,`set_unset` FROM teachers_roomsset WHERE set_unset='Unassigned'");
                while($data_unassignedId=mysql_fetch_array($unassignedId)){
                    $teacherUnassigned_id=$data_unassignedId['techears_id'];

                    $get_TeachersName=mysql_query("SELECT * FROM tbl_login WHERE id='$teacherUnassigned_id'");
                    $data_teachersName=mysql_fetch_array($get_TeachersName);
                    ?>
                    <tr>
                        <td><?php echo $data_teachersName['account']; ?></td>
                        <td>
                            <select style="width: 50%;">
                                <?php 
                                $Unassigned_rooms=mysql_query("SELECT * FROM teachers_roomsset WHERE techears_id='$teacherUnassigned_id' And set_unset='Unassigned'");
                                while($data_Unassigned_rooms=mysql_fetch_array($Unassigned_rooms)){
                                    ?>
                                    <option><?php echo $data_Unassigned_rooms['teachers_room']; ?></option>
                                    <?php
                                }

                                  ?>
                            </select>
                        </td>
                        <td>
                            <form action="" method="POST">
                                <button class="action" name="unassigedTeachersRoom" value="<?php echo $teacherUnassigned_id; ?>">View</button>
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