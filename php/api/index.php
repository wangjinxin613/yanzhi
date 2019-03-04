<?php	
	header("Content-Type: text/html;charset=utf-8"); 
	require_once("../config.php");
	$arr = array();
	#传入用户id
	$uid = $_POST['uid'];
	//此页面循环出首页数据
	$sql->query("select * from list where tuijian = '1' order by tuijian_time desc");
	$i = -1;

	while($row = $sql->fetch_assoc()){
		$i++;
		$arr['data'][] = $row;
		#图片
		$res = mysql_query("select * from list_img where l_id = '$row[id]' and uid = '$row[uid]'");
		while($result = mysql_fetch_array($res)){
			$arr['data'][$i]['imgUrl'][]= $result['imgurl'];
		}
		#有多少人成功打赏
		$number_res = mysql_query("select count(*) count from reward_order where lid = '$row[id]' and status = '1'");
		$number_result = mysql_fetch_assoc($number_res);
		$arr['data'][$i]['rewardNumber'] = $number_result['count'];
		#最新打赏人头像照片
		$img_res = mysql_query("select * from reward_order where lid = '$row[id]' and status = '1' order by id desc limit 0,5");
		while($img_result = mysql_fetch_array($img_res)){
			$arr['data'][$i]['rewarderImg'][] = $img_result['avatarUrl'];
		}
		# 最新的一个打赏人
		$name_res = mysql_query("select * from reward_order where lid = '$row[id]' and status = '1' order by id desc limit 0,1");
		$name_result = mysql_fetch_assoc($name_res);
		$arr['data'][$i]['rewarderName'] = $name_result['nickName'];
		#检查当前的图片集有没有被打赏
		$isReward_res = mysql_query("select count(*) count from reward_order where uid = '$uid' and lid = '$row[id]' and status = '1'");
		$isReward_result = mysql_fetch_assoc($isReward_res);
		if($uid == $row['uid']){
			$arr['data'][$i]['isReward'] = 1;
		}else{
			if($isReward_result['count'] > 0){
			$arr['data'][$i]['isReward'] = 1;
			}else{
			$arr['data'][$i]['isReward'] = 0;
			}
		}
		
	}
	echo json_encode($arr);
?>	