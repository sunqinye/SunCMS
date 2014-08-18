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

if(isset($_GET['word'])){
	$word = urldecode($_GET['word']);
	$keywords = explode(" ", $word);
	$where = '';
	foreach($keywords as $key => $keyword){
		if($keyword != ''){
			if($key != '0'){
				$where .= ' OR `content` LIKE \'%'.$keyword.'%\'';
			}else{
				$where .= '`content` LIKE \'%'.$keyword.'%\'';
			}
		}
	}
	$searchs = $db->table("module_article")->where("$where")->page('20')->selectall();
	$page = $db->show('3');
	//print_r($searchs);
}
?>