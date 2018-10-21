
<?php 
include"admin/connection.php";


$dir_path="RoomPicture/";
$option="";

if(is_dir($dir_path)){
    $files=opendir($dir_path);
    if($files){
        while(($file_name=readdir($files)) !== FALSE){
            if($file_name != '.' &&  $file_name != '..'){
            
             } 

$profile_display=mysql_query("SELECT * FROM rooms ORDER BY id DESC");
while($data_profile_display=mysql_fetch_array($profile_display)){
     $image=$data_profile_display['img'];
     $building=$data_profile_display['building'];
     $floor=$data_profile_display['floor'];
     $roomName=$data_profile_display['room'];
   
     $roomID=$data_profile_display['id'];

 
if($image==$file_name){
        
?>


<div class="target" id="equipments">
    <span ><b>Name:  </b><?php echo $roomName; ?></span>
    <img src="images/placeholder-grid.png" style="background-image: url(<?php echo "RoomPicture/$image" ?>);">
    <span ><b>Building:  </b><?php echo $building; ?></span>
    <span ><b>Floor:  </b><?php echo $floor; ?></span>
    
    <form action="" method="POST">
    <button name="room_page" type="submit" value="<?php echo $roomID; ?>">View </button>
    </form>
</div>
<?php
}
}
}
}
}   
?>