<?php	
	header("Content-Type: text/html;charset=utf-8"); 
	require_once("../config.php");
	$arr = array();
	$uid = $_POST['uid'];
	$sql->query("select distinct(b.id),b.* from list a,reward_order b where a.id = b.lid and a.uid = '$uid' and b.status = '1'");
	$i = -1;
	while($row = $sql->fetch_assoc()){
		$i++;
		$arr['data'][] = $row;
		//我的图集列表首图
		$res = mysql_query("select * from list_img where l_id = '$row[lid]' order by id asc");
		$result = mysql_fetch_assoc($res);
		$arr['data'][$i]['rewardImg'] = $result['imgurl'];
	}
	echo json_encode($arr);
?>