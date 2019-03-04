<?php
	require_once("../config.php");
	$uid = $_POST['uid'];

	//$money = $_POST['money'];
	$lid = $_POST['lid'];
	//先检查当前图片集有没有被该用户打赏过
	$sql->query("select count(*) count from reward_order where uid = '$uid'  and lid = '$lid' and status = '1'");
	$row = $sql->fetch_assoc();

	if($row['count'] > 0){
		echo 'success';
	}
	
	
?>