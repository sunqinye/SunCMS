<?php
/**
 * SunCMS For utf-8
 * This is an open-source software, follow the Apache License 2.0 (http://www.apache.org/licenses/LICENSE-2.0)
 * Copyright: Author All rights reserved.
 * @Author: Sun Qinye  sunqinye@gmail.com
 * @Github: https://github.com/sunqinye/SunCMS
 */
if(!defined('IN_SunCMS')) exit('Access Denied');

if($op == 'default'){
	require_once(FILE_PATH.'admin/template/common/common.html');
	require_once(FILE_PATH.'admin/template/common/header.html');
	$myinfo = $db->table("admin")->where("`uid`='$adminUid'")->selectone();
	require_once(FILE_PATH.'admin/template/user/user_myinfo.html');
	require_once(FILE_PATH.'admin/template/common/footer.html');
}
?>