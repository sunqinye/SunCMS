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

if($pop == 'default'){
	require_once(FILE_PATH.'admin/template/user/login.html');
}

if($pop == 'login'){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$icode = strtolower($_POST['icode']);
	if($icode != $_SESSION["icode"]){
		echo "<script>location='admin.php';</script>";
		exit();
	}
	if(empty($username) || empty($password)){
		echo "<script>location='admin.php';</script>";
		exit();
	}else{
		$user = $db->table("admin")->where("`username`='$username'")->selectone();
		if(empty($user)){
			echo "<script>location='admin.php';</script>";
			exit();
		}else{
			$password = md5(md5(md5($password.$config['SAFE_KEY'])));
			if($password != $user['password']){
				echo "<script>location='admin.php';</script>";
				exit();
			}else{
				$ip = getIp();
				$db->table("admin")->where("`uid`='$user[uid]'")->update("`lastDatetime`=now(),`lastIp`='$ip'");
				cookie('adminUid',$user['uid'],3600);
				cookie('adminGid',$user['gid'],3600);
				cookie('adminUsername',$user['username'],3600);
				cookie('adminUser_key',$user['uid'].$user['gid'].$user['username'],3600);
				Jump('admin.php');
			}
		}
	}
}
?>