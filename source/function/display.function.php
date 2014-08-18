<?php
/**
 * SunCMS For utf-8
 * This is an open-source software, follow the Apache License 2.0 (http://www.apache.org/licenses/LICENSE-2.0)
 * Copyright: Author All rights reserved.
 * @Author: Sun Qinye  sunqinye@gmail.com
 * @Github: https://github.com/sunqinye/SunCMS
 *
 * 展示函数文件
 */
if(!defined('IN_SunCMS')) exit('Access Denied');

function columnList($channel,$parentid){
	global $db;
	$columns = $db->table("column")->where("`channel`='$channel' and `parentid`='$parentid' and `hidden`='0'")->order("`order`")->selectall();
	if(empty($columns)) return;
	foreach($columns as $column){
		echo '<li>';
		for($i=1; $i<$column['deep']; $i++)
			echo '&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '<a href="index.php?chan='.$channel.'&col='.$column['cid'].'"><span>'.$column['name'].'</span></a></li>';
		columnList($channel,$column['cid']);
	}
}

function channelList(){
	global $db;
	$channels = $db->table("channel")->where("`hidden`='0'")->order("`order`")->selectall();
	foreach($channels as $channel){
		if($channel['type'] == 1){
			echo '<li><a href="index.php?chan='.$channel['cid'].'">'.$channel['name'].'</a></li>';
		}else{
			echo '<li><a href="'.$channel['url'].'" target="_blank">'.$channel['name'].'</a></li>';
		}
	}
}

function articleList($channel,$column,$limit=10,$style=1){
	global $db;
	$articles = $db->table("module_article")->where("`column`='$column'")->order("`order`,`pubDatetime` DESC")->limit($limit)->selectall();
	if($style == '1'){
		foreach($articles as $article){
			echo '<li><a href="index.php?chan='.$channel.'&aid='.$article['id'].'&op=article_view">'.$article['title'].'</a></li>';
		}
	}
}

function advertise($aid){
	global $db;
	$advertise = $db->table("advertise")->where("`aid`='$aid'")->selectone("`type`");
	if($advertise['type'] == 1){
		$advertise_code = $db->table("advertise_code")->where("`aid`='$aid'")->selectone("`code`");
		echo declean($advertise_code['code']);
	}else if($advertise['type'] == 2){
		$advertise_image = $db->table("advertise_image")->where("`aid`='$aid'")->selectone();
		if(empty($advertise_image['url'])){
			echo '<img src="'.$advertise_image['image'].'" width="'.$advertise_image['width'].'" height="'.$advertise_image['height'].'" />';
		}else{
			echo '<a href="'.$advertise_image['url'].'" target="_blank"><img src="'.$advertise_image['image'].'" width="'.$advertise_image['width'].'" height="'.$advertise_image['height'].'" /></a>';
		}
	}
}

function columnListDeep1($channel,$num){
	global $db;
	$columns = $db->table("column")->where("`channel`='$channel' and `deep`='1'")->order("`order`")->selectall();
	foreach($columns as $column){
		echo '<li><a href="index.php?chan='.$channel.'&col='.$column['cid'].'">'.$column['name'].'</a></li>';
	}
}

/**** admin-display ****/

function adminColumnList($channel,$parentid){
	global $db;
	$columns = $db->table("column")->where("`channel`='$channel' and `parentid`='$parentid'")->order("`order`")->selectall();
	if(empty($columns)) return;
	foreach($columns as $column){
		echo '<li>';
		for($i=1; $i<$column['deep']; $i++)
			echo '&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '<a href="admin.php?chan='.$channel.'&col='.$column['cid'].'">'.$column['name'].'</a></li>';
		adminColumnList($channel,$column['cid']);
	}
}

function adminColumnListALL($channel,$parentid){
	global $db;
	$columns = $db->table("column")->where("`channel`='$channel' and `parentid`='$parentid'")->order("`order`")->selectall();
	if(empty($columns)) return;
	foreach($columns as $column){
		echo '<tr><td>';
		for($i=1; $i<$column['deep']; $i++)
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo $column['name'].'</td>';
		echo '<td class="tac">'.$column['cid'].'</td>';
		echo '<td class="tac">'.$column['type'].'</td>';
		echo '<td class="tac"><a href="admin.php?mod=channel&op=editcolumn&chan='.$channel.'&col='.$column['cid'].'">编辑</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" class="deletecolumn" cid="'.$column['cid'].'">删除</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="admin.php?mod=channel&op=addcolumn&chan='.$channel.'&pid='.$column['cid'].'&deep='.$column['deep'].'">添加子栏目</a></td>';
		echo '<td class="tac">'.$column['order'].'</td>';
		echo '</tr>';
		adminColumnListALL($channel,$column['cid']);
	}
}
?>