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

$channels = $db->table("channel")->order("`order`")->selectall();
$chan = isset($_GET['chan'])?$_GET['chan']:0;
$channel = $db->table("channel")->where("`cid`='$chan'")->selectone();
if(empty($channel)) $chan = 0;
require_once(FILE_PATH.'admin/template/index/index_top.html');

if($chan == 0){
	$userNum = $db->table("user")->num_rows();
	$channelNum = $db->table("channel")->num_rows();
	$columnNum = $db->table("column")->num_rows();
	$pageNum = $db->table("module_page")->num_rows();
	$articleNum = $db->table("module_article")->num_rows();
	$productNum = $db->table("module_product")->num_rows();
	$leavewordNum = $db->table("module_leaveword")->num_rows();
	require_once(FILE_PATH.'admin/template/index/index.html');
}else{
	permit('homepagecontent');
	$columns = $db->table("column")->where("`channel`='$chan'")->order("`order`")->selectall();
	$col = isset($_GET['col'])?$_GET['col']:0;
	$column = $db->table("column")->where("`channel`='$chan' and `cid`='$col'")->selectone();
	if(empty($column)) $col = 0;
	if($col == 0){
		$column = isset($columns['0'])?$columns['0']:0;
		$col = isset($columns['0']['cid'])?$columns['0']['cid']:0;
	}
	$is_columnPermit = $db->table("group_column")->where("`cid`='$column[cid]' and `gid`='$adminGid'")->selectone();
	switch($column['type']){
		case "page":
			require_once(FILE_PATH.'admin/module/module/page/page.php');
			break;
		case "article":
			require_once(FILE_PATH.'admin/module/module/article/article.php');
			break;
		case "product":
			require_once(FILE_PATH.'admin/module/module/product/product.php');
			break;
		case "leaveword":
			require_once(FILE_PATH.'admin/module/module/leaveword/leaveword.php');
			break;
		case "picture":
			require_once(FILE_PATH.'admin/module/module/picture/picture.php');
			break;
		case "null":
			require_once(FILE_PATH.'admin/module/module/null/null.php');
			break;
	}
}
require_once(FILE_PATH.'admin/template/common/footer.html');
?>