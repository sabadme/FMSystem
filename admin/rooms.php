<?php 
include"admin/connection.php";
 ?>


<div class="form-container">
    <div class="inner-form-container">

        <div class="table-container" id="wrapper">
            <input class="search" type="text" placeholder="Search rooms..." />
            

            <table>
                <thead>
                <th>Room</th>
                <th>Single Equipment</th>
                <th>Set Equipment</th>
            
                </thead>

                <tbody> 
                       <?php 
                      
                        $get_room=mysql_query("SELECT * FROM rooms WHERE roomORvenue='Room' ORDER BY id desc");
                        while($data_room=mysql_fetch_array($get_room)){
                            $rooms=$data_room['room'];
                        
                    ?>
                <tr>
                 
                    <td data-th="Rooms"><?php echo $data_room['room']; ?></td>
                
                    <td data-th="Action">
                        <form action="" method="POST">
                        <button class="action secondary" name="view_roomE" type="submit" value="<?php echo $rooms; ?>">View</button>
                        </form>
                    </td>
                    <td data-th="Action">
                        <form action="" method="POST">
                        <button class="action secondary" name="view_roomSet" type="submit" value="<?php echo $rooms; ?>">View</button>
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

