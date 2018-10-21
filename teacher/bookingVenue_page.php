<?php 
if(isset($_REQUEST['viewEquipmentBooking'])){

include"admin/connection.php";
	$viewEquipmentBooking=$_REQUEST['viewEquipmentBooking'];


$dir_path="RoomPicture/";
$option="";

if(is_dir($dir_path)){
    $files=opendir($dir_path);
    if($files){
        while(($file_name=readdir($files)) !== FALSE){
            if($file_name != '.' &&  $file_name != '..'){
            
             } 

$view=mysql_query("SELECT * FROM rooms WHERE room='$viewEquipmentBooking'");
$data_view=mysql_fetch_array($view);
     $image=$data_view['img'];
     $roomName =$data_view['room'];
     $roomBuilding =$data_view['building'];
     $roomFloor =$data_view['floor'];


 
if($image==$file_name){
    
?>

<div class="accounts-container">
    <div class="top-container">
            <strong>Room: <?php echo $roomName; ?></strong>
            <a href="logout.php" class="logout"></a>
    </div>

    <div class="product-page-container">
    <!-- <div class="product-banner-container">
        <img src="images/product-page-banner.jpg" />
    </div> -->

    <div class="product-inner-container">
        <div class="image-container">
            <img src="images/placeholder-product.png" style="background: url(<?php echo "RoomPicture/$image" ?>) no-repeat;">

        </div>
        <div class="product-info-container">
            <span class="equipment-code"><?php echo
            $roomBuilding.' | '.$roomFloor; ?></span>
           
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date Start</th>
                        <th>Date End</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                          <?php 
                  $sql_bookingEquipment = mysql_query("SELECT * FROM booking WHERE venue = '$viewEquipmentBooking' And status = 'Approved'");
                  while($data_bookingEquipment = mysql_fetch_array($sql_bookingEquipment)){
                      $equipmentBookingID = $data_bookingEquipment['equipment'];

                    $sql_equipmentBooking = mysql_query("SELECT * FROM equipment WHERE id='$equipmentBookingID'");
                    $data_EquipmentBooking = mysql_fetch_array($sql_equipmentBooking);
                    $imageEquipmentBooking = $data_EquipmentBooking['equipment_filename'];
                    $equipmentNameBooking = $data_EquipmentBooking['equipment_name'];
                    $equipmentDateBooking = $data_EquipmentBooking['equipment_start'];
                    $equipmentTimeBooking = $data_EquipmentBooking['equipment_end'];
                    ?>
                       <tr>
                        <td><?php echo "<img style='object-fit: cover; width: 50px; height: 50px' src='EquipmentPicture/" . $imageEquipmentBooking . "'>" ?></td>
                          <td><?php echo $equipmentNameBooking; ?></td>
                          <td><?php echo $equipmentDateBooking; ?></td>
                          <td><?php echo $equipmentTimeBooking; ?></td>
                          <td>Additional</td>
                      </tr>
                      <?php

                  }

                   ?>

                   
                 <?php 

                    $sql_roomEquipment = mysql_query("SELECT * FROM rooms_equipment WHERE room='$roomName'");
                    while($data_roomEquipment =mysql_fetch_array($sql_roomEquipment)){
                      $roomEquipment = $data_roomEquipment['equipment'];

                      $sql_equipment = mysql_query("SELECT * FROM equipment WHERE id='$roomEquipment'");
                      $data_Equipment = mysql_fetch_array($sql_equipment);
                      $equipmentSet_name = $data_Equipment['set_name'];


                      if($equipmentSet_name == "None"){
                          $imageEquipment=$data_Equipment['equipment_filename'];
                          $equipmentName=$data_Equipment['equipment_name'];
                          $equipmentDate = $data_Equipment['equipment_start'];
                          $equipmentTime = $data_Equipment['equipment_end'];
                      }else{

                      $equipmentSet_name = $data_Equipment['set_name'];

                      $sql_EquipmentSet = mysql_query("SELECT DISTINCT `set_name`,`img_filename`,`date`,`time` FROM equipmentset WHERE set_name = '$equipmentSet_name'");
                      $dataEquipmentSet = mysql_fetch_array($sql_EquipmentSet);
                      $imageEquipment = $dataEquipmentSet['img_filename'];
                      $equipmentName=$dataEquipmentSet['set_name'];
                      $equipmentDate = $dataEquipmentSet['date'];
                      $equipmentTime = "None";
                      }

                      ?>
                      <tr>
                        <td><?php echo "<img style='width: 50px; height: 50px' src='EquipmentPicture/" . $imageEquipment . "'>" ?></td>
                          <td><?php echo $equipmentName; ?></td>
                          <td><?php echo $equipmentDate; ?></td>
                          <td><?php echo $equipmentTime; ?></td>
                          <td>Accountable</td>
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
<?php

}
}
}

}
}


?>

