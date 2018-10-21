<?php 
        $servername ="localhost";
        $username="root";
        $password="";
        $db="monitoringsystemdatabase";


        $conn =mysql_connect($servername,$username,$password);
        mysql_select_db($db);


        $sql_booking = mysql_query("SELECT * FROM booking ORDER BY id desc");
        while($dataBooking = mysql_fetch_array($sql_booking)){

            $equipmentID = $dataBooking['equipment'];
             $time = $dataBooking['time_start'];
            $time_e = $dataBooking['time_end'];

            //time start
     $timestamp = strtotime($time);


//time end
     $timestamps = strtotime($time_e);

       
            ?>
            <tr>
                <td data-th="Booker"><?php echo $dataBooking['booker']; ?></td>
                <td data-th="Venue"><?php echo $dataBooking['venue']; ?></td>
                <td data-th="Semester"><?php echo $dataBooking['sem']; ?></td>
                <td data-th="Date Start"><?php echo $dataBooking['date_start']; ?></td>
                <td data-th="Date End"><?php echo date("H:i:A", $timestamp); ?></td>
                <td data-th="Time Start"><?php echo $dataBooking['date_end']; ?></td>
                <td data-th="Time End"><?php echo date("H:i:A", $timestamps); ?></td>
                <?php 
                if($equipmentID == ""){
                    ?>
                    <td></td>
                    <?php
                }else{
                    ?>
                    <td data-th="Action"><form action="" method="POST"><button name="equipmentBookingView" type="submit" value="<?php echo $equipmentID; ?>">View</button></form></td>
                    <?php
                }
                 ?>                
                <td data-th="Status"><?php echo $dataBooking['status']; ?></td>
                <form action="" method="POST">
                <td data-th="choice">
                    
                        <select name="choice">
                            <option>Approved</option>
                            <option>Cancel</option>
                        </select>       
                </td>
                <td>
                    <button name="submitChoice" type="submit" value="<?php echo $dataBooking['id']; ?>">Submit</button>
                    
                </td>
                </form>
            </tr>
            <?php
        }

     ?>