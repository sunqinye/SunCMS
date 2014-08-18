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

if($pop == 'addchannel'){
	$type = $_POST['type'];
	$name = $_POST['name'];
	$url = $_POST['url'];
	$target = $_POST['target'];
	$hidden = $_POST['hidden'];
	$order = $_POST['order'];
	$db->table("channel")->insert("(`type`,`name`,`url`,`target`,`hidden`,`order`) VALUES('$type','$name','$url','$target','$hidden','$order')");
	$channel = $db->insert_id();
	echo '<script>location="admin.php?mod=channel&chan='.$channel.'"</script>';
}

if($pop == 'editchannel'){
	$cid = $_POST['cid'];
	$type = $_POST['type'];
	$name = $_POST['name'];
	$url = $_POST['url'];
	$target = $_POST['target'];
	$hidden = $_POST['hidden'];
	$order = $_POST['order'];
	$db->table("channel")->where("`cid`='$cid'")->update("`type`='$type',`name`='$name',`url`='$url',`target`='$target',`hidden`='$hidden',`order`='$order'");
	echo '<script>location="admin.php?mod=channel&chan='.$cid.'"</script>';
}

if($pop == 'deletechannel'){
	$cid = $_POST['cid'];
	$db->table("channel")->where("`cid`='$cid'")->delete();
}

if($pop == 'addcolumn'){
	$coltype = $_POST['coltype'];
	$name = $_POST['name'];
	$url = $_POST['url'];
	$target = $_POST['target'];
	if($coltype == 1){
		$type = $_POST['type'];
	}else{
		$type = "null";
	}
	$channel = $_POST['channel'];
	$parentid = $_POST['parentid'];
	$deep = $_POST['deep']+1;
	$hidden = $_POST['hidden'];
	$order = $_POST['order'];
	$db->table("column")->insert("(`coltype`,`name`,`url`,`target`,`type`,`channel`,`parentid`,`deep`,`hidden`,`order`) VALUES('$coltype','$name','$url','$target','$type','$channel','$parentid','$deep','$hidden','$order')");
	if($type == 'page'){
		$column = $db->insert_id();
		$db->table("module_page")->insert("(`column`,`datetime`) VALUES('$column',now())");
	}
	echo '<script>location="admin.php?mod=channel&chan='.$channel.'"</script>';
}

if($pop == 'editcolumn'){
	$coltype = $_POST['coltype'];
	$cid = $_POST['cid'];
	$url = $_POST['url'];
	$target = $_POST['target'];
	$channel = $_POST['channel'];
	$name = $_POST['name'];
	if($coltype == 1){
		$type = $_POST['type'];
	}else{
		$type = "null";
	}
	$hidden = $_POST['hidden'];
	$order = $_POST['order'];
	$db->table("column")->where("`cid`='$cid'")->update("`coltype`='$coltype',`name`='$name',`url`='$url',`target`='$target',`type`='$type',`hidden`='$hidden',`order`='$order'");
	echo '<script>location="admin.php?mod=channel&chan='.$channel.'"</script>';
}

if($pop == 'deletecolumn'){
	$cid = $_POST['cid'];
	$db->table("column")->where("`cid`='$cid'")->delete();
}
?>