<?
	require('../conn.php');
	require('../class/index_config.php');
	$order_id = $_GET['id'];
	mysql_select_db("my_db", $con);
	$result1 = mysql_query("SELECT * FROM chongzhi where id = '$order_id'");
	while($v = mysql_fetch_array($result1))
 	{
 		$status = $v['status'];
 		$gbi= $v['gbi'];
 		$uid  = $v['uid'];
 			
 			
 	}
 	//�ݴ���� 
 	if($status == 0){
 	 echo '<script>alert(\'֧������\');'; echo '"</script>';
 	}
 			$get_gbi = $user->money + $gbi; //�����˻�����
		
			$sql = "update user set money = '$get_gbi' where id= '$user->user_id'";
			mysql_query($sql);	
			
		 	echo '<script>window.location.href="'; echo "../cz_succ.php"; echo '";</script>';


?>