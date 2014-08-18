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
	$products = $db->table("module_product")->where("`column`='$col'")->page(6)->selectall();
	$showPage = $db->show(2);
}
if($op == 'product_view'){
	$id = isset($_GET['pid'])?$_GET['pid']:'0';
	if($id != '0'){
		$product = $db->table("module_product")->where("`id`='$id'")->selectone();
	}
}

require_once(FILE_PATH.'template/default/module/product/product.html');
?>