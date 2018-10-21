<?php 
if(isset($_REQUEST['equipment_page'])){

include"admin/connection.php";
	$equipment_id=$_REQUEST['equipment_page'];


$dir_path="EquipmentPicture/";
$option="";

if(is_dir($dir_path)){
    $files=opendir($dir_path);
    if($files){
        while(($file_name=readdir($files)) !== FALSE){
            if($file_name != '.' &&  $file_name != '..'){
            
             } 

    $sql_room=mysql_query("SELECT * FROM room WHERE equipment='$equipment_id'");
    $data_room=mysql_fetch_array($sql_room);
    $set_status=$data_room['set_status'];
    $equipmentID=$data_room['equipment'];

    if($set_status=="Set"){

        $sql_equipmentSet=mysql_query("SELECT * FROM equipmentset WHERE id='$equipmentID'");
        $data_equipmentSet=mysql_fetch_array($sql_equipmentSet);
        $image=$data_equipmentSet['img_filename'];
        $equipment_code=$data_equipmentSet['setQr_code'];
        $equipment_name=$data_equipmentSet['set_name'];

    }else{



$view=mysql_query("SELECT * FROM equipment WHERE `id`='$equipment_id'");
$data_view=mysql_fetch_array($view);
     $image=$data_view['equipment_filename'];
     $equipment_code=$data_view['equipment_code'];
     $equipment_name=$data_view['equipment_name'];
     $equipment_start=$data_view['equipment_start'];
     $equipment_end=$data_view['equipment_end'];
     
}
 
if($image==$file_name){
    
?>
<div class="product-page-container">
    <div class="product-banner-container">
        <img src="images/product-page-banner.jpg" />
    </div>

    <div class="product-inner-container">
        <div class="image-container">
            <img src="images/placeholder-product.png" style="background: url(<?php echo "EquipmentPicture/$image" ?>) no-repeat;">

        </div>
        <div class="product-info-container">
            <span class="equipment-code"><b>Equipment QR/Code:</b> <?php echo $equipment_code; ?></span>
            <h1 class="equipment-name"><?php echo $equipment_name; ?></h1>
            <span class="equipment-start"><b>Registered:</b> <?php echo $equipment_start; ?></span>
            <span class="equipment-end"><b>Expiration Date:</b> <?php echo $equipment_end; ?></span>
            <div class="qr-img-container">

<?php
$views=mysql_query("SELECT * FROM equipment WHERE `id`='$equipment_id'");
$data_views=mysql_fetch_array($views);
$get_equipmentcode=$data_views['equipment_code'];

echo "<img src='QRimg/".$get_equipmentcode.".png'>";
?>  
                <a class="button">Print QR</a>
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

