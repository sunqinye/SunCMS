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

if($pop == 'create_art'){
	$title = $_POST['title'];
	$column = $_POST['column'];
	$author = $_POST['author'];
	$source = $_POST['source'];
	$sourceurl = $_POST['sourceurl'];
	$content = $_POST['content'];
	$clicknum = $_POST['clicknum'];
	$order = $_POST['order'];
	if(empty($title)){
		echo "<script>alert('标题必须填写');history.back();</script>";
		exit();
	}else{
		$db->table("module_article")->insert("(`column`,`title`,`author`,`source`,`sourceurl`,`content`,`clicknum`,`pubDatetime`,`order`) VALUES('$column','$title','$author','$source','$sourceurl','$content','$clicknum',now(),'$order')");
		Jump("admin.php?chan=".$_POST['chan']."&col=".$_POST['column']);
	}
}

if($pop == 'edit_art'){
	$id = $_POST['id'];
	$title = $_POST['title'];
	$author = $_POST['author'];
	$source = $_POST['source'];
	$sourceurl = $_POST['sourceurl'];
	$content = $_POST['content'];
	$clicknum = $_POST['clicknum'];
	$order = $_POST['order'];
	if(empty($title)){
		echo "<script>alert('标题必须填写');history.back();</script>";
		exit();
	}else{
		$db->table("module_article")->where("`id`='$id'")->update("`title`='$title',`author`='$author',`source`='$source',`sourceurl`='$sourceurl',`content`='$content',`clicknum`='$clicknum',`order`='$order'");
		Jump("admin.php?chan=".$_POST['chan']."&col=".$_POST['col']);
	}
}

if($pop == 'delete_art'){
	$id = $_POST['id'];
	$db->table("module_article")->where("`id`='$id'")->delete();
}

?>