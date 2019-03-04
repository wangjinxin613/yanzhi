<?php
	header("Content-Type: text/html;charset=utf-8"); 
	require_once("../config.php");
	$beizhu = $_POST['beizhu'];
	$uid = $_POST['uid'];
	$nickName = $_POST['nickName'];
	$avatarUrl = $_POST['avatarUrl'];
	$sql->insert("list","uid,beizhu,nickName,avatarUrl,time","'$uid','$beizhu','$nickName','$avatarUrl','$time'");
	$insert_id = $sql->insert_id();
	echo $insert_id;
?>