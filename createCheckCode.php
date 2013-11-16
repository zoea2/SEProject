<?php
	
	$height = 50;
	$width = 160;
	$im = imagecreate($width,$height);
	$bgcolor = imagecolorallocate($im, rand(200,255),rand(200,255),rand(200,255));
	$fonturl="adobegothicstd-bold.otf";
	$char = "1234567890ABCDEFGHIJKLMNOQPRSTUVWXYZ";
	$y = floor($height/2)+floor($height/4);
	$count = 5;
	$code = "";
	for($i = 0;$i < $count;$i++){
		$x = floor($width/$count) * $i + 3;
		$index = rand(0,35);
		$latter = $char[$index];
		$code .= $latter;
		$angle = rand(-20,20);
		$fontsize = rand(30,35);
		$color = ImageColorAllocate($im,rand(0,50),rand(50,100),rand(100,140));
		imagettftext($im,$fontsize,$angle,$x,$y,$color,$fonturl,$latter);
	}
	$count = 20;
	for($i = 0;$i < $count;$i++){
		$x = rand(0,$width);
		$y = rand(0,$height);
		$angle = rand(0,360);
		$fontsize = rand(8,12);
		$index = rand(0,35);
		$latter = $char[$index];
		$color = ImageColorAllocate($im, rand(40,140),rand(40,140),rand(40,140));
		imagettftext($im,$fontsize,$angle,$x,$y,$color,$fonturl,$latter);
	}
	header("Content-Type:image/jpeg");
	imagejpeg($im);
	imagedestroy($im);	
	session_start();
	$_SESSION['checkcode'] = $code;
?>

