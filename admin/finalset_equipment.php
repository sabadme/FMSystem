<?php 
if(isset($_REQUEST['Add_equipment_setFinal'])){

	   	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	
    $str="";
	$size = strlen( $chars );
	for( $i = 0; $i < 10; $i++ ) {
		$str.= $chars[ rand( 0, $size - 1 ) ];
	}

	$file=$_FILES['imgset'];

	$name=$_FILES['imgset'] ['name'];
	$size=$_FILES['imgset'] ['size'];	
	$type=$_FILES['imgset'] ['type'];
	$error=$_FILES['imgset'] ['error'];
	$tmp=$_FILES['imgset'] ['tmp_name'];

	if ($error > 0) {
		die("Error uploading File! Code $error.");
	}
	if ($type=="video/avi") {
		die("That Format is not allowed!");
	}
	else{
		move_uploaded_file($tmp,"EquipmentPicture/".$name);
		
	}
		$setName=$_REQUEST['setName'];
		//$equipment_codeSet=$_REQUEST['equipment_codeSet'];
		$date=date("Y-m-d");
		$time=date("H:i:s");


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

		if(isset($_REQUEST['finalset_equipment'])){
	 $finalset_equipment=$_REQUEST['finalset_equipment'];

	 for ($i=0; $i < count($finalset_equipment) ; $i++) { 
	 	 $check=$finalset_equipment[$i];

	 	 $insert=mysql_query("INSERT INTO equipmentSet VALUES(0,'$setName','$check','$date','$time','$str','$name','1','Unassigned')");
	 	 echo mysql_error();  
if($insert){
	
	?> <script> 
 alert("Record Successfully Added "); </script>
 <?php 
}else {
 	?> <script>
 alert("Error "); </script>
 <?php
}



if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}

$update_status="UPDATE equipment SET `status`='Set',`set_name`='$setName',`carrier`='Set' WHERE id='$check'";

if (mysql_query($update_status)) {?>


     <?php
} else {?>
    <script>alert("Error"); </script>
    <?php
}



	 

}
}
mysql_close($conn);

}

 ?>