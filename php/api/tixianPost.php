<?php
	require_once("../config.php");
	$uid = $_POST['uid'];
	$money = round($_POST['money'],2);
	$dao_money = round($money * 0.99,2);
	$sql->query("select * from user where id = '$uid'");
	$row = $sql->fetch_assoc();
	if($money > $row['money']){
		echo '提现金额过大';
	}else if($money < 10){
		echo "最少提现10元";
	}else{
		//体现记录
		$sql->insert("tixian","uid,money,time,dao_money","'$uid','$money','$time','$dao_money'");
		//修改用户金额
		$sql->query("update user set money = money - '$money' where id = '$uid'");
		echo 'success';
	}
?>