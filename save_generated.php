<?php 

	$data = $_POST['image'];
	$equip_code = $_POST['img_name'];

    $data = str_replace('data:image/png;base64,', '', $data);
    $data = base64_decode($data);
    file_put_contents("QRimg/".$equip_code.".png", $data);

?>