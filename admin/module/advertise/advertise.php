<?php
/**
 * SunCMS For utf-8
 * This is an open-source software, follow the Apache License 2.0 (http://www.apache.org/licenses/LICENSE-2.0)
 * Copyright: Author All rights reserved.
 * @Author: Sun Qinye  sunqinye@gmail.com
 * @Github: https://github.com/sunqinye/SunCMS
 */
if(!defined('IN_SunCMS')) exit('Access Denied');

permit('advertise');

require_once(FILE_PATH.'admin/template/common/common.html');
require_once(FILE_PATH.'admin/template/common/header.html');

if($op == 'default'){
	$advertises = $db->table("advertise")->page(15)->selectall();
	$pageshow = $db->show(3);
}

if($op == 'edit'){
	$aid = isset($_GET['aid'])?$_GET['aid']:'0';
	if($aid != '0'){
		$advertise = $db->table("advertise")->where("`aid`='$aid'")->selectone();
		if($advertise['type'] == 1){
			$advertise_code = $db->table("advertise_code")->where("`aid`='$aid'")->selectone();
		}else if($advertise['type'] == 2){
			$advertise_image = $db->table("advertise_image")->where("`aid`='$aid'")->selectone();
		}
	}
}

if($op == 'focus'){
	$advertises = $db->table("advertise_focus")->selectall();
}

require_once(FILE_PATH.'admin/template/advertise/advertise.html');
require_once(FILE_PATH.'admin/template/common/footer.html');
?>