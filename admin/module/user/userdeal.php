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

if($pop == 'delete_user'){
	$uid = $_POST['uid'];
	$db->table("user")->where("`uid`='$uid'")->delete();
}

if($pop == 'delete_admin'){
	$uid = $_POST['uid'];
	$db->table("admin")->where("`uid`='$uid'")->delete();
}

if($pop == 'edit_user'){
	$uid = $_POST['uid'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$group = $_POST['group'];
	$email = $_POST['email'];
	if(empty($username)){
		echo "<script>alert('用户名必须填写');history.back();</script>";
		exit();
	}else{
		if(empty($password)){
			$db->table("user")->where("`uid`='$uid'")->update("`username`='$username',`gid`='$group',`email`='$email'");
			Jump('admin.php?mod=user');
		}else{
			$password = md5(md5(md5($password.$config['SAFE_KEY'])));
			$db->table("user")->where("`uid`='$uid'")->update("`username`='$username',`gid`='$group',`password`='$password',`email`='$email'");
			Jump('admin.php?mod=user');
		}
	}
}

if($pop == 'edit_admin'){
	$uid = $_POST['uid'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$group = $_POST['group'];
	$email = $_POST['email'];
	if(empty($username)){
		echo "<script>alert('用户名必须填写');history.back();</script>";
		exit();
	}else{
		if(empty($password)){
			$db->table("admin")->where("`uid`='$uid'")->update("`username`='$username',`gid`='$group',`email`='$email'");
			Jump('admin.php?mod=user&op=listadmin');
		}else{
			$password = md5(md5(md5($password.$config['SAFE_KEY'])));
			$db->table("admin")->where("`uid`='$uid'")->update("`username`='$username',`gid`='$group',`password`='$password',`email`='$email'");
			Jump('admin.php?mod=user&op=listadmin');
		}
	}
}

if($pop == 'edit_myinfo'){
	$uid = $_POST['uid'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	if(empty($password)){
		$db->table("admin")->where("`uid`='$uid'")->update("`email`='$email'");
		Jump('admin.php?mod=myinfo');
	}else{
		$password = md5(md5(md5($password.$config['SAFE_KEY'])));
		$db->table("admin")->where("`uid`='$uid'")->update("`password`='$password',`email`='$email'");
		Jump('admin.php?mod=myinfo');
	}
}

if($pop == 'add_user'){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$group = $_POST['group'];
	$email = $_POST['email'];
	if(empty($username) || empty($password)){
		echo "<script>alert('用户名和密码必须填写');history.back();</script>";
		exit();
	}else{
		$user = $db->table("user")->where("`username`='$username'")->selectone();
		if(!empty($user)){
			echo "<script>alert('用户已存在');history.back();</script>";
			exit();
		}else{
			$password = md5(md5(md5($password.$config['SAFE_KEY'])));
			$db->table("user")->insert("(`username`,`password`,`gid`,`email`) VALUES ('$username','$password','$group','$email')");
			Jump('admin.php?mod=user');
		}
	}
}

if($pop == 'add_admin'){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$group = $_POST['group'];
	$email = $_POST['email'];
	if(empty($username) || empty($password)){
		echo "<script>alert('用户名和密码必须填写');history.back();</script>";
		exit();
	}else{
		$admin = $db->table("admin")->where("`username`='$username'")->selectone();
		if(!empty($admin)){
			echo "<script>alert('管理员已存在');history.back();</script>";
			exit();
		}else{
			$password = md5(md5(md5($password.$config['SAFE_KEY'])));
			$db->table("admin")->insert("(`username`,`password`,`gid`,`email`) VALUES ('$username','$password','$group','$email')");
			Jump('admin.php?mod=user&op=listadmin');
		}
	}
}

if($pop == 'add_group'){
	$name = $_POST['name'];
	if(empty($name)){
		echo "<script>alert('请填写组名称');history.back();</script>";
		exit();
	}else{
		$db->table("group")->insert("(`name`) VALUES ('$name')");
		Jump('admin.php?mod=user&op=managegroup');
	}
}

if($pop == 'edit_group'){
	$gid = $_POST['gid'];
	$name = $_POST['name'];
	$allowhomepagecontent = $_POST['allowhomepagecontent'];
	$allowset = $_POST['allowset'];
	$allowchannel = $_POST['allowchannel'];
	$allowuser = $_POST['allowuser'];
	$allowadvertise = $_POST['allowadvertise'];
	$is_columnPermitChange = $_POST['is_columnPermitChange'];
	if(empty($name)){
		echo "<script>alert('请填写组名称');history.back();</script>";
		exit();
	}else{
		$db->table("group")->where("`gid`='$gid'")->update("`name`='$name',`allowhomepagecontent`='$allowhomepagecontent',`allowset`='$allowset',`allowchannel`='$allowchannel',`allowuser`='$allowuser',`allowadvertise`='$allowadvertise'");
		if($is_columnPermitChange == 1){
			$db->table("group_column")->where("`gid`='$gid'")->delete();
			$columns_permit = isset($_POST['columns_permit'])?$_POST['columns_permit']:'';
			if(!empty($columns_permit)){
				foreach($columns_permit as $column_permit){
					$db->table("group_column")->insert("(`cid`,`gid`) VALUES ('$column_permit','$gid')");
				}
			}
		}
		Jump('admin.php?mod=user&op=managegroup');
	}
}
?>