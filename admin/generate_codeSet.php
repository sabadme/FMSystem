<?php 

if(isset($_REQUEST['generate_codeSet'])){

   	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	

	$size = strlen( $chars );
	for( $i = 0; $i < 10; $i++ ) {
		$str.= $chars[ rand( 0, $size - 1 ) ];
	}

	
 


}
 ?>