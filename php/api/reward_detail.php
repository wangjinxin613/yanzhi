<?php	
	header("Content-Type: text/html;charset=utf-8"); 
	require_once("../config.php");
	$lid = $_POST['lid'];
	$arr = array();
	//此页面循环出首页数据
	$sql->query("select * from list where id = '$lid'");
	$i = -1;
	$row = $sql->fetch_assoc();
		
		$arr['data'] = $row;
		$res = mysql_query("select * from list_img where l_id = '$row[id]'");
		while($result = mysql_fetch_array($res)){
			$arr['data']['imgUrl'][]= $result['imgurl'];
		}
	#有多少人成功打赏
	$number_res = mysql_query("select count(*) count from reward_order where lid = '$row[id]' and status = '1'");
	$number_result = mysql_fetch_assoc($number_res);
	$arr['data']['rewardNumber'] = $number_result['count'];
	#最新打赏人头像照片
	$img_res = mysql_query("select * from reward_order where lid = '$row[id]' and status = '1' order by id desc limit 0,5");
	while($img_result = mysql_fetch_array($img_res)){
		$arr['data']['rewarderImg'][] = $img_result['avatarUrl'];
	}
	# 最新的一个打赏人
	$name_res = mysql_query("select * from reward_order where lid = '$row[id]' and status = '1' order by id desc limit 0,1");
	$name_result = mysql_fetch_assoc($name_res);
	$arr['data']['rewardName'] = $name_result['nickName'];
	#发布人的openid
	$openid_res = mysql_query("select * from user where id = '$row[uid]'");
	$openid_result = mysql_fetch_assoc($openid_res);
	$arr['data']['openid'] = $openid_result['openId'];
	echo json_encode($arr);
?>	