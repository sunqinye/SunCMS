<?php
/**
 * SunCMS For utf-8
 * This is an open-source software, follow the Apache License 2.0 (http://www.apache.org/licenses/LICENSE-2.0)
 * Copyright: Author All rights reserved.
 * @Author: Sun Qinye  sunqinye@gmail.com
 * @Github: https://github.com/sunqinye/SunCMS
 */
function icode($num=4,$size=22,$width=80,$height=30){
	$str = "23456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVW";
	for ($i = 0; $i < $num; $i++){
		$icode[$i] = $str[mt_rand(0,strlen($str)-1)];
	}
	// ��ͼ��
	$img = imagecreatetruecolor($width,$height);
	// ������
	imagefilledrectangle($img,0,0,$width,$height,imagecolorallocate($img,245,245,245));
	// ���߿�
	imagerectangle($img,0,0,$width-1,$height-1,imagecolorallocate($img,240,240,240));
	// ��������
	for($i=0; $i<5; $i++){
		$font_color = imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
		imagearc($img,mt_rand(-$width,$width),mt_rand(-$height,$height),mt_rand(30,$width*2),mt_rand(20,$height*2),mt_rand(0,360),mt_rand(0,360),$font_color);
	}
	// �����ŵ�
	for($i=0; $i<50; $i++){
		$font_color = imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
		imagesetpixel($img,mt_rand(0,$width),mt_rand(0,$height),$font_color);
	}
	// ����֤��
	for($i=0; $i<4; $i++){
		@imagefttext($img,$size,mt_rand(-30,30),14*($i+1),25,imagecolorallocate($img,mt_rand(0,200),mt_rand(0,120),mt_rand(0,120)),'c:\\WINDOWS\\Fonts\\simsun.ttc',$icode[$i]);
	}
	session_start();
	$icode = implode('',$icode);
	$_SESSION["icode"] = strtolower($icode);
	header("Cache-Control:max-age=1,s-maxage=1,no-cache,must-revalidate");
	header("Content-type:image/PNG;");
	imagepng($img);
	imagedestroy($img);
}

$loca = isset($_GET['loca'])?$_GET['loca']:'default';
if($loca == 'login'){
	icode();
}
?>