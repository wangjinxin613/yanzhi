<?php
	require_once("../../class/mysql_class.php");
	require_once("../config/adminConfig.php");
	$username = $_POST['username'];
	$sql->query("select * from member where username = '$username'");
	$areaId = $_POST['areaId'];
	$areaIdNum = strlen($areaId);
	if($areaIdNum == '2'){
		$dept = 1;
	}else if($areaIdNum == '4'){
		$dept = 2;
	}else{
		$dept = 3;
	}
	if($sql->db_num_rows() > 0 ){
		$sql->Get_admin_msg("","存在相同的用户名，请重新添加");
	}else{
		$sql->insert("member","username,password,trueName,tel,email,areaId,areaName,creatTime,dept","'$_POST[username]','$_POST[password]','$_POST[fullname]','$_POST[phone]','$_POST[email]','$_POST[areaId]','$_POST[areaName]','$nowTime','$dept'");
	$sql->Get_admin_msg("","添加新会员成功");
	}
	
?>