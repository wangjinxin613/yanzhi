<?php
	require_once("../config.php");
	$order_id = $_POST['order_id'];
	$sql->query("select * from reward_order where id = '$order_id'");
	$row = $sql->fetch_assoc();
	if($row['status'] == 1){
		$lid = $row['lid']; //图片列表id
		$money = $row['money']; //赞赏金额
		$sql->query("select * from list where id = '$lid'");
		$res = $sql->fetch_assoc();
		$uid_ed = $res['uid']; // 被赞赏人的用户id
		$sql->query("update user set money = money + '$money' where id = '$uid_ed'"); //增加账户余额
		$sql->query("update user set lj_money = lj_money + '$money' where id = '$uid_ed'"); //增加累计金额
		$sql->query("update user set lj_ci = lj_ci + 1 where id = '$uid_ed'"); //增加累计次数
		$arr = array();
		$sql->query("select * from list_img where l_id = '$lid' and uid = '$uid_ed'");
		while($row = $sql->fetch_assoc()){
			$arr['data']['imgUrl'][] = $row['imgurl'];
		}
		echo json_encode($arr);
	}

?>