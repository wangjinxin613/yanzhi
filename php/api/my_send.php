<?php	
	header("Content-Type: text/html;charset=utf-8"); 
	require_once("../config.php");
	$uid = $_POST['uid'];
	$arr = array();
	//此页面循环出首页数据
	$sql->query("select * from list where uid = '$uid' order by id desc ");
	$i = -1;
	while($row = $sql->fetch_assoc()){
		$i++;
		$arr['data'][] = $row;
		$res = mysql_query("select * from list_img where l_id = '$row[id]' and uid = '$row[uid]'");
		while($result = mysql_fetch_array($res)){
			$arr['data'][$i]['imgUrl'][]= $result['imgurl'];
		}
		 #有多少人成功打赏
		$number_res = mysql_query("select count(*) count from reward_order where lid = '$row[id]' and status = '1'");
		$number_result = mysql_fetch_assoc($number_res);
		$arr['data'][$i]['rewardNumber'] = $number_result['count'];
		#有多少人成功打赏
		$money_res = mysql_query("select sum(money) count from reward_order where lid = '$row[id]' and status = '1'");
		$money_result = mysql_fetch_assoc($money_res);
		if( $money_result['count'] == null){
			$arr['data'][$i]['rewardMoney'] = 0;
		}else{
			$arr['data'][$i]['rewardMoney'] = round($money_result['count'],2);
		}
		
	}
	echo json_encode($arr);
?>	