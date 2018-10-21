<?php 

$status=$_SESSION['status'];
include"admin/connection.php";
$count="0";
$booking=mysql_query("SELECT DISTINCT `booker`,`date_start`,`date_end`,`time_start`,`time_end`,`venue`,`sem` FROM booking ORDER BY id desc");
while($data_booking=mysql_fetch_array($booking)){
    $booker=$data_booking['booker'];
    $date=$data_booking['date_start'];
    $date_e=$data_booking['date_end'];
    $time=$data_booking['time_start'];
    $time_e=$data_booking['time_end'];

    $count++;
    

    $booking_status=mysql_query("SELECT * FROM booking WHERE booker='$booker' And date_start='$date' And date_end='$date_e' And time_start='$time' And time_end='$time_e'");
    $data_status=mysql_fetch_array($booking_status);
    $statuss=$data_status['status'];
    $booker_name=$data_status['booker'];

//time start
    $timestamp = strtotime($time);


//time end
     $timestamps = strtotime($time_e);
     

    $sql_bookerName=mysql_query("SELECT * FROM tbl_login WHERE account='$booker_name'");
    $data_bookerName=mysql_fetch_array($sql_bookerName);

    ?>
    <tr>
        <td data-th="Account"><?php echo $data_bookerName['account']; ?></td>
        <td data-th="Venue"><?php echo $data_booking['venue']; ?></td>
        <td data-th="Semester"><?php echo $data_booking['sem']; ?></td>
        <td data-th="Date Start"><?php echo $data_booking['date_start']; ?></td>
        <td data-th="Date End"><?php echo $data_booking['date_end']; ?></td>
        <td data-th="Time Start"><?php echo date("H:i:A", $timestamp); ?></td>
        <td data-th="Time End"><?php echo date("H:i:A", $timestamps); ?></td>
        <td data-th="Action">
            <ul>
            <?php
                          $venue=mysql_query("SELECT * FROM booking  WHERE booker='$booker' And date_start='$date' And date_end='$date_e' And time_start='$time' And time_end='$time_e'");
                $data_venue=mysql_fetch_array($venue);

                $equipmentID = $data_venue['equipment'];

           $sql_equipment = mysql_query("SELECT * FROM equipment WHERE id='$equipmentID'");
                      $dataSql_equipment = mysql_fetch_array($sql_equipment);
                      $equipmentBook = $dataSql_equipment['id'];

            
            ?>
            <li>

              <?php 



                if($equipmentBook == ""){

                }else{
                    ?>
                    <form action="" method="POST">
                        <button name="equipmentBookingView" type="submit" value="<?php echo $equipmentBook; ?>">View</button>
                    </form>
              
                    <?php
                }
            
               ?>
                   
            </li>
         
                </ul>
        </td>
       
        <?php 
        if($statuss=="Pending" And $status=="Admin"){
            ?>
            <td data-th="Action"><form action="" method="POST"><button class="action" type="submit" name="approve_booking" value="<?php echo $data_status['id']; ?>">Approve</button></form></td>
            <?php
        }else{
            ?>
            <td data-th="Status"><?php echo $statuss; ?></td>
            <?php
        }
         ?>
        
        
        
       
    </tr>
    <?php
}

 ?>
 