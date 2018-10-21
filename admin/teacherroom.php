<?php 

        $teacherroom=$_REQUEST['teacherroom'];

        include"admin/connection.php";

        $select_teacherName=mysql_query("SELECT * FROM tbl_login WHERE id='$teacherroom'");
        $data_teachername=mysql_fetch_array($select_teacherName);
 ?> 
<div class="manage-container room-management with-banner">
    <strong class="title"><?php echo $data_teachername['account']; ?></strong>

    <div class="manage-inner-container">
        <div class="tabs-container">
           <div class="form-container">
    <div class="inner-form-container">

        <div class="table-container" id="wrapper">
            <input class="search" type="text" placeholder="Search rooms..." />

            <table>
                <thead>
                <th>Room</th>
                <th>Assigned</th>
            
                <th></th>
                </thead>
                <tbody>
                    <?php 

                        $select_room=mysql_query("SELECT * FROM teachers_roomsset WHERE techears_id='$teacherroom' And set_unset='Assigned'");
                        while($data_room=mysql_fetch_array($select_room)){
                            ?>
                            <tr>
                                <td><?php echo $data_room['teachers_room']; ?></td>
                                <td><?php echo $data_room['assigned_date']; ?></td>
                              
                                <td>
                                    <form action="" method="POST">
                                        <button class="action" name="unassigned_function" value="<?php echo $data_room['id']; ?>">Unassigned</button>
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
    
 ?>