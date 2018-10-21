    <?php 
        $servername ="localhost";
        $username="root";
        $password="";
        $db="monitoringsystemdatabase";


        $conn =mysql_connect($servername,$username,$password);
        mysql_select_db($db);


date_default_timezone_set('Asia/Manila');
 $dd= date('Y-m-d');

date_default_timezone_set('Asia/Manila');
 $tt=date('H:i:A');


        $sql_booking = mysql_query("SELECT * FROM booking WHERE status='Approved' ORDER BY id desc");
        while($dataBooking = mysql_fetch_array($sql_booking)){

            $equipmentID = $dataBooking['equipment'];
             $time = $dataBooking['time_start'];
            $time_e = $dataBooking['time_end'];
             $dateStart = $dataBooking['date_start'];
             $dateEnd = $dataBooking['date_end'];
             $bookingID = $dataBooking['id'];
             $bookingVenue = $dataBooking['venue'];

            //time start
      $timestamp = strtotime($time);



//time end
     $timestamps = strtotime($time_e);

   
        $timeStart = date("H:i:A", $timestamp);

      if($timeStart == "00:00:AM"){
         $timeStart="12:00:AM";
      }else{
        $timeStart;
      }



        $timeEnd = date("H:i:A", $timestamps);

      if($timeEnd == "00:00:AM"){
         $timeEnd="12:00:AM";
    }else{
         $timeEnd;
    }
     
    if($dd > $dateEnd ){
    
    $sqlCheck = mysql_query("SELECT * FROM admin_notif WHERE booking_id ='$bookingID'");
    $dataCheck = mysql_fetch_array($sqlCheck);
    $bookingID_CHECk = $dataCheck['booking_id'];

    if($bookingID_CHECk == $bookingID){

    }else{
     

$insert=mysql_query("INSERT INTO admin_notif VALUES(0,'None','None','None','$bookingID','$bookingVenue','$equipmentID','Ended')");
        if($insert){
        }else{

        }
        }

          

    }else if($dd == $dateEnd && $timeEnd < $tt){
         $bookingID;
      
$insert=mysql_query("INSERT INTO admin_notif VALUES(0,'None','None','None','$bookingID','$bookingVenue','$equipmentID','Ended')");
        if($insert){
        }else{

        }
    
        }
    }

     ?>