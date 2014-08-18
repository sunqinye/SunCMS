<?php
/**
 * SunCMS For utf-8
 * This is an open-source software, follow the Apache License 2.0 (http://www.apache.org/licenses/LICENSE-2.0)
 * Copyright: Author All rights reserved.
 * @Author: Sun Qinye  sunqinye@gmail.com
 * @Github: https://github.com/sunqinye/SunCMS
 */
if(!defined('IN_SunCMS')) exit('Access Denied');

permit('channel');

require_once(FILE_PATH.'admin/template/common/common.html');
require_once(FILE_PATH.'admin/template/common/header.html');

$channels = $db->table("channel")->order("`order`")->selectall();

$chan = $chan = isset($_GET['chan'])?$_GET['chan']:1;

if($op == 'editchannel'){
	$cid = isset($_GET['chan'])?$_GET['chan']:'0';
	if($cid != '0'){
		$channel = $db->table("channel")->where("`cid`='$cid'")->selectone();
	}
}

if($op == 'editcolumn'){
	$cid = isset($_GET['col'])?$_GET['col']:'0';
	if($cid != '0'){
		$column = $db->table("column")->where("`cid`='$cid'")->selectone();
	}
}

if($op == 'addcolumn' || $op== 'editcolumn'){
	$modules = $db->table("module")->selectall();
}

require_once(FILE_PATH.'admin/template/channel/channel.html');
require_once(FILE_PATH.'admin/template/common/footer.html');
?>