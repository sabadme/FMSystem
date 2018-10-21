<?php 
if(isset($_REQUEST['addNewGroupFunction'])){

	$addNewGroupFunction = $_REQUEST['addNewGroupFunction'];

$servername ="localhost";
$username="root";
$password="";
$db="monitoringsystemdatabase";


$conn =mysql_connect($servername,$username,$password);
mysql_select_db($db);

$sql_Equipment = mysql_query("SELECT * FROM equipment WHERE equipment_name='$addNewGroupFunction'");
$data_equipment = mysql_fetch_array($sql_Equipment);
$equipmentType =$data_equipment['equipmentType'];
$name = $data_equipment['equipment_filename'];

	$equipment_start=$_REQUEST['equipment_start'];
	$equipment_end=$_REQUEST['equipment_end'];
	


		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	
		$str="";
	$size = strlen( $chars );
	for( $i = 0; $i < 10; $i++ ) {
		$str.= $chars[ rand( 0, $size - 1 ) ];
	}



	
	



$status="Unassigned";
$insert=mysql_query("INSERT INTO equipment VALUES(0,'$str','$addNewGroupFunction','$equipmentType','$equipment_start','$equipment_end','$name','$status','Up to date','None','Group')");
		if($insert){
			
			?> <script> 
		 alert("Record Successfully Added in UserSubmit table"); </script>
		 <?php 
		include "admin/groupSet.php";
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
