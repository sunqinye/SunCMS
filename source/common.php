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
define("SITE_PATH", "http://".$_SERVER['HTTP_HOST'].substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'],'/')+1));	//获取站点路径

require_once(FILE_PATH.'config/global.config.php');
require_once(FILE_PATH.'source/module/module.php');
require_once(FILE_PATH.'source/class/mysql.class.php');
require_once(FILE_PATH.'source/function/global.function.php');
require_once(FILE_PATH.'source/function/display.function.php');

$_GET = clean($_GET);	//全部过滤，事实上并不科学
$_POST = clean($_POST);	//全部过滤，事实上并不科学

$db = db();	//生成数据库对象
$website = $db->table("website")->selectone();	//读取数据库中的网站信息

if(isset($_SERVER["PATH_INFO"])){	//路由设置
	$_URL = explode('/',$_SERVER["PATH_INFO"]);
	$mod = isset($_URL[1])?$_URL[1]:'index';
	if(isset($_URL[2])){
		$op = is_numeric($_URL[2])?'default':$_URL[2];
		if($op == 'd') $op = 'default';
	}else{
		$op = 'default';
	}
}else{
	$mod = isset($_GET['mod'])?$_GET['mod']:'index';
	$op = isset($_GET['op'])?$_GET['op']:'default';
}

if(!array_key_exists($mod,$module)) Jump(SITE_PATH);

require_once(FILE_PATH.'source/module/'.$module["$mod"]);
?>