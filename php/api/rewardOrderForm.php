<?php
	require_once("../config.php");
	$uid = $_POST['uid'];
	$money = $_POST['money'];
	$lid = $_POST['lid'];
	$nickName = $_POST['nickName'];
	$avatarUrl = $_POST['avatarUrl'];
	//先检查当前图片集有没有被该用户打赏过
	$sql->query("select count(*) count from reward_order where uid = '$uid' and money = '$money' and lid = '$lid'");
	$row = $sql->fetch_assoc();
	//如果存在就不需要再次创建
	if($row['count'] > 0){
		$sql->query("select * from reward_order where uid = '$uid' and money = '$money' and lid = '$lid'");
		$row = $sql->fetch_assoc();
		echo $row['id'];
	}else{
		$sql->insert("reward_order","uid,money,lid,nickName,avatarUrl,time","'$uid','$money','$lid','$nickName','$avatarUrl','$time'");
		echo $sql->insert_id();
	}
	
	
?>