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
	$articles = $db->table("module_article")->where("`column`='$col'")->order("`order`,`pubDatetime` DESC")->page(20)->selectall();
	$showPage = $db->show(2);
}
if($op == 'article_view'){
	$id = isset($_GET['aid'])?$_GET['aid']:'0';
	if($id != '0'){
		$article = $db->table("module_article")->where("`id`='$id'")->selectone();
	}
}

require_once(FILE_PATH.'template/default/module/article/article.html');
?>