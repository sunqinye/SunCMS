<?php
/**
 * SunCMS For utf-8
 * This is an open-source software, follow the Apache License 2.0 (http://www.apache.org/licenses/LICENSE-2.0)
 * Copyright: Author All rights reserved.
 * @Author: Sun Qinye  sunqinye@gmail.com
 * @Github: https://github.com/sunqinye/SunCMS
 */
if(!defined('IN_SunCMS')) exit('Access Denied');

require_once(FILE_PATH.'admin/template/common/common.html');
require_once(FILE_PATH.'admin/template/common/header.html');
if($op == 'default'){
	$m_leavewords = $db->table("module_leaveword")->where("`column`='$col'")->order("`datetime` DESC")->page(15)->selectall();
	$pageshow = $db->show(3);
}

if($op == 'viewLeaveword'){
	permitColumn($is_columnPermit);
	$id = isset($_GET['id'])?$_GET['id']:'0';
	if($id != '0'){
		$leaveword = $db->table("module_leaveword")->where("`id`='$id'")->selectone();
	}
}

require_once(FILE_PATH.'admin/template/module/leaveword/leaveword.html');
require_once(FILE_PATH.'admin/template/common/footer.html');
?>