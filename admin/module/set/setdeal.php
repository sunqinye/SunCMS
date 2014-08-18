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

if($pop == 'save'){
	$sitename = $_POST['sitename'];
	$url = $_POST['url'];
	$title = $_POST['title'];
	$keywords = $_POST['keywords'];
	$description = $_POST['description'];
	$switch = $_POST['switch'];
	$closereason = $_POST['closereason'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$zipcode = $_POST['zipcode'];
	$address = $_POST['address'];
	$beian = $_POST['beian'];
	$is_comment = $_POST['is_comment'];
	$db->table("website")->where("`wid`='1'")->update("`sitename`='$sitename',`url`='$url',`title`='$title',`keywords`='$keywords',`description`='$description',`switch`='$switch',`closereason`='$closereason',`beian`='$beian',`phone`='$phone',`email`='$email',`zipcode`='$zipcode',`address`='$address',`is_comment`='$is_comment'");
	echo '<script>history.back();</script>';
}
?>