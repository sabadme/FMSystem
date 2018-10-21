<?php 
if(isset($_REQUEST['returnEuipment'])){
	$returnEuipment = $_REQUEST['returnEuipment'];

		    $servername ="localhost";
            $username="root";
            $password="";
            $db="monitoringsystemdatabase";



            $conn =mysql_connect($servername,$username,$password);
            mysql_select_db($db);

       if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}

$update_status="UPDATE booking SET `equipmentStatus`='Return' WHERE equipment='$returnEuipment'";

if (mysql_query($update_status)) {?>
<script>
	alert("UPDATE STATUS");
</script>
     <?php

     $sqlReturnBooking_ID  = mysql_query("SELECT * FROM booking WHERE equipment ='$returnEuipment'");
     $dataReturnBooking_ID = mysql_fetch_array($sqlReturnBooking_ID);
     $BookingID_return = $dataReturnBooking_ID['id'];
     $venue = $dataReturnBooking_ID['venue'];
     $booker = $dataReturnBooking_ID['booker'];


     $sqlUser = mysql_query("SELECT * FROM tbl_login WHERE account='$booker'");
     $dataUser = mysql_fetch_array($sqlUser);
     $UserID = $dataUser['id'];

     $insert=mysql_query("INSERT INTO admin_notif VALUES(0,'None','None','None','$BookingID_return','$venue','$returnEuipment','Return')");
        if($insert){
         }else{ 
         }

         $insert_userNotif=mysql_query("INSERT INTO user_notif VALUES(0,'$UserID','1','Return')");
        if($insert_userNotif){
         }else{ 
         }


} else {?>
    <script>alert("Error"); </script>
    <?php
}
}

 ?>