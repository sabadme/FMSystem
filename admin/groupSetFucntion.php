
 <?php 
if(isset($_REQUEST['saveGroupEquipementSet'])){

	$numbersOfEquipemnt=$_REQUEST['numbersOfEquipemnt'];

		$servername ="localhost";
		$username="root";
		$password="";
		$db="monitoringsystemdatabase";


		$conn =mysql_connect($servername,$username,$password);
		mysql_select_db($db);

/*	$file=$_FILES['imgs'];
	$name=$_FILES['imgs'] ['name'];
	$size=$_FILES['imgs'] ['size'];	
	$type=$_FILES['imgs'] ['type'];
	$error=$_FILES['imgs'] ['error'];
	$tmp=$_FILES['imgs'] ['tmp_name'];

	if ($error > 0) {
		die("Error uploading File! Code $error.");
	}
	if ($type=="video/avi") {
		die("That Format is not allowed!");
	}
	else{
		move_uploaded_file($tmp,"EquipmentPicture/".$name);
		
	}*/


	for( $j=0; $j< $numbersOfEquipemnt; $j++){

		//generate QR code
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$str = "";
		$size = strlen( $chars );
		for( $i = 0; $i < 10; $i++ ) {
			$str.= $chars[ rand( 0, $size - 1 ) ];
		}
		 $j."---".$str." test<br>";

			$equipment_name=$_REQUEST['equipment_name'];
			$equipment_start=$_REQUEST['equipment_start'];
			$equipment_end=$_REQUEST['equipment_end'];
			$equipmentType = $_REQUEST['equipmentType'];
			$highANDlow = $_REQUEST['highANDlow'];



			

		echo mysql_error();  
	 	$qrimg = "<img id='generated_img' src='module_qr/php/qr_img.php?d=$str'>";
    ?><div style="display:none"><?php echo $qrimg;?></div> <?php
    echo "<canvas id='myCanvas' style='visibility:hidden' />";

    

	sleep(2);

    echo "

    	<script>
			    
		    var c=document.getElementById('myCanvas');
		    var ctx=c.getContext('2d');
		    c.width = 130;
		    c.height = 130;
		    var img=document.getElementById('generated_img');
		    ctx.drawImage(img,10,10);

		    var canvas_icon = c.toDataURL('image/png');

		    function success(response){

		    }

		    $.ajax({
		    	type: 'POST',
		    	url: 'GSFsave_generated.php',
		    	data: { image: canvas_icon, img_name: '$str'},
		    	async: false,
		    	success: success
		    });

    	</script>

    ";

    $status="Unassigned";

		$upload_image=mysql_query("INSERT INTO equipment VALUES(0,'$str','$equipment_name','$equipmentType','$equipment_start','$equipment_end','$name','$status','Up To Date','None','Group','$highANDlow')");
		echo mysql_error();  
		if($upload_image){
			
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

		 include "admin/groupSet.php";
		}else {
		  echo "Error adding record"; 
		}	

	

		$qrimg = "";
		$str = "";
		//end of QR code     





	}


}

?>