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
	$id = $_POST['id'];
	$title = $_POST['title'];
	$image = $_POST['image'];
	$description = $_POST['description'];
	$db->table("module_picture")->where("`id`='$id'")->update("`title`='$title',`image`='$image',`description`='$description'");
	Jump("admin.php?chan=".$_POST['chan']."&col=".$_POST['column']);
}

if($pop == 'add'){
	$column = $_POST['column'];
	$title = $_POST['title'];
	$image = $_POST['image'];
	$description = $_POST['description'];
	$db->table("module_picture")->insert("(`column`,`title`,`image`,`description`,`datetime`) VALUES('$column','$title','$image','$description',now())");
	Jump("admin.php?chan=".$_POST['chan']."&col=".$_POST['column']);
}

if($pop == 'delete'){
	$id = $_POST['id'];
	$db->table("module_picture")->where("`id`='$id'")->delete();
}

if($pop == 'upImage'){
	$imageconfig = array(
        "savePath" => "data/image/",
        "maxSize" => 10000, //KB
        "allowFiles" => array(".gif", ".png", ".jpg", ".jpeg", ".bmp")
    );
    $upimage = new upload("upfile", $imageconfig);
    $info = $upimage->getFileInfo();
	echo $info['url'];
}
?>