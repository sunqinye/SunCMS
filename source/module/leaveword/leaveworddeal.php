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

if($pop == 'add_leaveword'){
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$company = $_POST['company'];
	$content = $_POST['content'];
	$chan = $_POST['chan'];
	$col = $_POST['col'];
	if(empty($name) || empty($phone) || empty($email) || empty($company) || empty($content)){
		echo "<script>alert('请填写全部内容');history.back();</script>";
		exit();
	}else{
		$db->table('module_leaveword')->insert("(`column`,`name`,`phone`,`email`,`company`,`content`,`datetime`) VALUES ('$col','$name','$phone','$email','$company','$content',now())");
		echo "<script>alert('您的留言提交成功，我们会及时给您回复');location='index.php?chan=".$chan."&col=".$col."'</script>";
	}
}
?>