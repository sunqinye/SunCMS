<?php
/**
 * SunCMS For utf-8
 * This is an open-source software, follow the Apache License 2.0 (http://www.apache.org/licenses/LICENSE-2.0)
 * Copyright: Author All rights reserved.
 * @Author: Sun Qinye  sunqinye@gmail.com
 * @Github: https://github.com/sunqinye/SunCMS
 */
if(!defined('IN_SunCMS')) exit('Access Denied');

permit('user');

require_once(FILE_PATH.'admin/template/common/common.html');
require_once(FILE_PATH.'admin/template/common/header.html');

//将从0起始改为从1起始
$result = $db->table("group")->selectall();
foreach ($result as $value){
	$groups[$value['gid']] = $value;
}

if($op == 'default'){
	$users = $db->table("user")->page(20)->selectall();
	$pageshow = $db->show(3);
}
if($op == 'edit'){
	$uid = isset($_GET['uid'])?$_GET['uid']:'0';
	if($uid != '0'){
		$userinfo = $db->table("user")->where("`uid`='$uid'")->selectone();
	}
}

if($op == 'editadmin'){
	$uid = isset($_GET['uid'])?$_GET['uid']:'0';
	if($uid != '0'){
		$userinfo = $db->table("admin")->where("`uid`='$uid'")->selectone();
	}
}

if($op == 'listadmin'){
	$users = $db->table("admin")->page(20)->selectall();
	$pageshow = $db->show(3);
}

if($op == 'managegroup'){
	$gid = isset($_GET['gid'])?$_GET['gid']:'1';
	$groupall = $groups[$gid];
	$channels = $db->table("channel")->selectall();
	$group_columns = $db->table("group_column")->where("`gid`='$gid'")->selectall();
	foreach ($group_columns as $group_column){
		$columns_permit[] = $group_column['cid'];
	}
	if(empty($columns_permit)) $columns_permit = array();
}

require_once(FILE_PATH.'admin/template/user/user.html');
require_once(FILE_PATH.'admin/template/common/footer.html');
?>