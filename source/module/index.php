<?php
/**
 * SunCMS For utf-8
 * This is an open-source software, follow the Apache License 2.0 (http://www.apache.org/licenses/LICENSE-2.0)
 * Copyright: Author All rights reserved.
 * @Author: Sun Qinye  sunqinye@gmail.com
 * @Github: https://github.com/sunqinye/SunCMS
 */
if(!defined('IN_SunCMS')) exit('Access Denied');

require_once(FILE_PATH.'template/default/common/common.html');
require_once(FILE_PATH.'template/default/common/header.html');

$chan = isset($_GET['chan'])?$_GET['chan']:0;
$channel = $db->table("channel")->where("`cid`='$chan'")->selectone();
if(empty($channel)) $chan = 0;

if($chan == 0){
	require_once(FILE_PATH.'template/default/index.html');
}else{
	$col = isset($_GET['col'])?$_GET['col']:0;
	$column = $db->table("column")->where("`channel`='$chan' and `cid`='$col'")->selectone();
	if(empty($column)) $col = 0;
	if($col == 0){
		$column = $db->table("column")->where("`channel`='$chan'")->order("`order`")->selectone();
		$col = $column['cid'];
	}
	switch($column['type']){
		case "page":
			require_once(FILE_PATH.'source/module/page/page.php');
			break;
		case "article":
			require_once(FILE_PATH.'source/module/article/article.php');
			break;
		case "product":
			require_once(FILE_PATH.'source/module/product/product.php');
			break;
		case "leaveword":
			require_once(FILE_PATH.'source/module/leaveword/leaveword.php');
			break;
		case "null":
			require_once(FILE_PATH.'source/module/null/null.php');
			break;
	}
}

require_once(FILE_PATH.'template/default/common/footer.html');
?>