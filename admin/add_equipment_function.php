<?php 
if(isset($_REQUEST['save_equipment'])){


		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	
		$str="";
	$size = strlen( $chars );
	for( $i = 0; $i < 10; $i++ ) {
		$str.= $chars[ rand( 0, $size - 1 ) ];
	}

	$file=$_FILES['imgs'];


	
	$equipment_name=$_REQUEST['equipment_name'];
	$equipment_start=$_REQUEST['equipment_start'];
	$equipment_end=$_REQUEST['equipment_end'];
	$equipmentType =$_REQUEST['equipmentType'];
	$highANDlow = $_REQUEST['highANDlow'];

	$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password);
mysql_select_db($db);

$status="Unassigned";
$insert=mysql_query("INSERT INTO equipment VALUES(0,'$str','$equipment_name','$equipmentType','$equipment_start','$equipment_end','None','$status','Up to date','None','Single','$highANDlow')");
		if($insert){
			
			?> <script> 
		 alert("Record Successfully Added in UserSubmit table"); </script>


		 <?php

		 // MULTIPLE UPLOAD IMAGES 
		extract($_POST);
    $error=array();
    $txtGalleryName	="";
    $extension=array("jpeg","jpg","png","gif");
    foreach($_FILES["imgs"]["tmp_name"] as $key=>$tmp_name)
            {
                $file_name=$_FILES["imgs"]["name"][$key];
                $file_tmp=$_FILES["imgs"]["tmp_name"][$key];
                $ext=pathinfo($file_name,PATHINFO_EXTENSION);
                if(in_array($ext,$extension))
                {
                    if(!file_exists("EquipmentPicture/".$txtGalleryName."/".$file_name))
                    {
                        /*move_uploaded_file($file_tmp=$_FILES["imgs"]["tmp_name"][$key],"QRimg/".."/".$file_name);	*/
                        move_uploaded_file($file_tmp,"EquipmentPicture/".$file_name);	

               
				$insertMultipleImg=mysql_query("INSERT INTO equipmentimage VALUES(0,'$str','$file_name')");
						if($insertMultipleImg){
						}else{
							echo"Error";
						}
                    }
                    else
                    {
                        $filename=basename($file_name,$ext);
                        $newFileName=$filename.time().".".$ext;
                        move_uploaded_file($file_tmp,"EquipmentPicture/".$file_name);	

                        $insertMultipleImg=mysql_query("INSERT INTO equipmentimage VALUES(0,'$str','$file_name')");
						if($insertMultipleImg){
						}else{
							echo"Error";
						}
                    }
                }
                else
                {
                    array_push($error,"$file_name, ");
                }
            }

            //CLOSING

		 include"admin/single_equipment.php";
		}else {
		  echo "Error adding record"; 
		}		


	 	$qrimg = "<img id='generated_img' src='module_qr/php/qr_img.php?d=$str'>";
    ?><div style="display:none"><?php echo $qrimg;?></div> <?php
    echo "<canvas id='myCanvas' style='visibility:hidden; position: absolute;' />";

    echo "

    	<script>
			window.onload = function() {
			    
				    var c=document.getElementById('myCanvas');
			    var ctx=c.getContext('2d');
			    c.width = 130;
			    c.height = 130;
			    var img=document.getElementById('generated_img');
			    ctx.drawImage(img,10,10);

			    var canvas_icon = c.toDataURL('image/png');

				    function success(response){

				    	// alert(response);

				    }

			    $.ajax({
			    	type: 'POST',
			    	url: 'save_generated.php',
			    	data: { image: canvas_icon, img_name: '$str'},
			    	success: success
			    });

			};	
    	</script>

    ";	






}

 ?>
