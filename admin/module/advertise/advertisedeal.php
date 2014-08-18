<?php
/**
 * SunCMS For utf-8
 * This is an open-source software, follow the Apache License 2.0 (http://www.apache.org/licenses/LICENSE-2.0)
 * Copyright: Author All rights reserved.
 * @Author: Sun Qinye  sunqinye@gmail.com
 * @Github: https://github.com/sunqinye/SunCMS
 */
if(!defined('IN_SunCMS')) exit('Access Denied');

$pop = isset($_POST['pop'])?$_POST['pop']:'default';

if($pop == 'edit'){
	$aid = $_POST['aid'];
	$title = $_POST['title'];
	$type = $_POST['type'];
	$db->table("advertise")->where("`aid`='$aid'")->update("`title`='$title',`datetime`=now()");
	if($type == 1){
		$code = $_POST['code'];
		$db->table("advertise_code")->where("`aid`='$aid'")->update("`code`='$code'");
	}else if($type == 2){
		$image = $_POST['image'];
		$width = $_POST['width'];
		$height = $_POST['height'];
		$url = $_POST['url'];
		$db->table("advertise_image")->where("`aid`='$aid'")->update("`image`='$image',`width`='$width',`height`='$height',`url`='$url'");
	}
	Jump("admin.php?mod=advertise");
}

if($pop == 'add'){
	$title = $_POST['title'];
	$type = $_POST['type'];
	$db->table("advertise")->insert("(`title`,`type`,`datetime`) VALUES('$title','$type',now())");
	$aid = $db->insert_id();
	if($type == 1){
		$code = $_POST['code'];
		$db->table("advertise_code")->insert("(`aid`,`code`) VALUES('$aid','$code')");
	}else if($type == 2){
		$image = $_POST['image'];
		$width = $_POST['width'];
		$height = $_POST['height'];
		$url = $_POST['url'];
		$db->table("advertise_image")->insert("(`aid`,`image`,`width`,`height`,`url`) VALUES('$aid','$image','$width','$height','$url')");
	}
	Jump("admin.php?mod=advertise");
}

if($pop == 'focus'){
	for($i = 1; $i < 5; $i++){
		$title = $_POST['title'.$i];
		$url = $_POST['url'.$i];
		$image = $_POST['image'.$i];
		$db->table("advertise_focus")->where("`id`='$i'")->update("`title`='$title',`url`='$url',`image`='$image'");
	}
	Jump("admin.php?mod=advertise&op=focus");
}

if($pop == 'upImage'){
	$config = array(
        "savePath" => "data/image/",
        "maxSize" => 10000, //KB
        "allowFiles" => array(".gif", ".png", ".jpg", ".jpeg", ".bmp")
    );
    $upimage = new upload("upfile", $config);
    $info = $upimage->getFileInfo();
	echo $info['url'];
}

if($pop == 'upImage2'){
	$config = array(
        "savePath" => "data/image/",
        "maxSize" => 10000, //KB
        "allowFiles" => array(".gif", ".png", ".jpg", ".jpeg", ".bmp")
    );
    $upimage = new upload("upfile", $config);
    $info = $upimage->getFileInfo();

	$img_dir = 'data/image/'.date("Ymd").'/';
	$new_dir = FILE_PATH.$img_dir.basename($info['url']);
	$Thumb = new Thumb('',$img_dir);
	$Thumb->reImg($new_dir,340,299);

	echo $info['url'];
}
?>