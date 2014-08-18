<?php
/**
 * SunCMS For utf-8
 * This is an open-source software, follow the Apache License 2.0 (http://www.apache.org/licenses/LICENSE-2.0)
 * Copyright: Author All rights reserved.
 * @Author: Sun Qinye  sunqinye@gmail.com
 * @Github: https://github.com/sunqinye/SunCMS
 */
if(!defined('IN_SunCMS')) exit('Access Denied');

if (DEBUG) {	//调试模式
	error_reporting(E_ALL);
} else {
	error_reporting(0);
}

header("content-type:text/html; charset=utf-8");
session_start();

require_once(FILE_PATH.'config/global.config.php');
require_once(FILE_PATH.'source/class/mysql.class.php');
require_once(FILE_PATH.'source/class/edcrypt.class.php');
require_once(FILE_PATH.'source/class/upload.class.php');
require_once(FILE_PATH.'source/class/thumb.class.php');
require_once(FILE_PATH.'source/function/global.function.php');
require_once(FILE_PATH.'source/function/display.function.php');
require_once(FILE_PATH.'admin/module/module.php');

$db = db();		//数据库实例化

$adminUid = getcookie('adminUid');
$adminGid = getcookie('adminGid');
$adminUsername = getcookie('adminUsername');
$adminUser_key = getcookie('adminUser_key');
if($adminUid.$adminGid.$adminUsername != $adminUser_key){
	unset($adminUid,$adminGid,$adminUsername,$adminUser_key);
}

$_GET = clean($_GET);
$_POST = clean($_POST);

$website = $db->table("website")->selectone();
if(!empty($adminGid)){
	$group = $db->table("group")->where("`gid`='$adminGid'")->selectone();
}

if(empty($adminUid)) $_GET['mod'] = 'login';

$mod = isset($_GET['mod'])?$_GET['mod']:'index';
if(!array_key_exists($mod,$module)) Jump('admin.php');
$op = isset($_GET['op'])?$_GET['op']:'default';

require_once(FILE_PATH.'admin/module/'.$module["$mod"]);
?>