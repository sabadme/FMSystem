<?php 
if(isset($_REQUEST['edit_set_equipment_fucntion'])){

	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	
	$str ="";
	$size = strlen( $chars );
	for( $i = 0; $i < 10; $i++ ) {
		$str.= $chars[ rand( 0, $size - 1 ) ];
	}


	$edit_set_equipment_fucntion=$_REQUEST['edit_set_equipment_fucntion'];
	$edit_set_name=$_REQUEST['edit_set_name'];

	$file=$_FILES['editsetimg'];

	$name=$_FILES['editsetimg'] ['name'];
	$size=$_FILES['editsetimg'] ['size'];	
	$type=$_FILES['editsetimg'] ['type'];
	$error=$_FILES['editsetimg'] ['error'];
	$tmp=$_FILES['editsetimg'] ['tmp_name'];

	if ($error > 0) {
		die("Error uploading File! Code $error.");
	}
	if ($type=="video/avi") {
		die("That Format is not allowed!");
	}
	else{
		move_uploaded_file($tmp,"EquipmentPicture/".$name);
		
	}

	
	
	

    $qrimg = "<img id='generated_img' src='module_qr/php/qr_img.php?d=$str'>";
    ?><div style="display:none"><?php echo $qrimg;?></div> <?php
    echo "<canvas id='myCanvas' style='visibility:hidden' />";

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
include"admin/connection.php";

/*$status="Unassigned";

$upload_image=mysql_query("INSERT INTO equipment VALUES(0,'$equipment_code','$equipment_name','$equipment_start','$equipment_end','$name','$status')");
echo mysql_error();  
if($upload_image){
	
	?> <script> 
 alert("Record Successfully Added in UserSubmit table"); </script>
 <?php 
}else {
  echo "Error adding record"; 
}*/

$select=mysql_query("SELECT * FROM equipmentset WHERE set_name='$edit_set_equipment_fucntion'");
while($data_select=mysql_fetch_array($select)){
if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}

$update_status="UPDATE equipmentset SET `set_name`='$edit_set_name',`setQr_code`='$str',`img_filename`='$name' WHERE set_name='$edit_set_equipment_fucntion'";

if (mysql_query($update_status)) {?>


     <?php
} else {?>
    <script>alert("Error"); </script>
    <?php
}
}

mysql_close($conn);

}

 ?>