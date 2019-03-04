<?php
	require_once("../../config.php");
	require_once("../config/adminConfig.php");
	$admin_name = $_POST['username'];
	
	$admin_password = trim($_POST['password']);
	$areaId = $_POST['areaId'];
	$areaName = $_POST['areaName'];
	# 区域id 和区域名不能空
	if($areaId == 0 || $areaName == null ){
		$sql->Get_admin_msg("","还没有选择区域");
	}
	$areaIdNum = strlen($areaId);
	if($areaIdNum == '2'){
		$dept = 1;
	}else if($areaIdNum == '4'){
		$dept = 2;
	}else{
		$dept = 3;
	}
	# 是否设置为主管理员
	$zo_dept = $_POST['zo_dept'];
	if($zo_dept != 1){
		$zo_dept = 0;
	}
	$password = md5($admin_password);
	#限定一个区域内只能有一个主管理员	
	if($zo_dept == 1){
		$sql->query("select * from admin where areaId = '$areaId' and zo_dept = '1'");
		if($sql->db_num_rows() > 0 ){
			$sql->Get_admin_msg("","所选区域内已经存在主管理员，请重新添加");
		}
	}
	#存在相同的账号
	$sql->query("select * from admin where admin_name = '$admin_name'");
	if($sql->db_num_rows() > 0 ){
		$sql->Get_admin_msg("","存在相同的账号，请重新添加");
	}else{
		$sql->insert("admin","admin_name,admin_password,admin_trueName,admin_tel,areaId,areaName,createTime,dept,zo_dept","'$_POST[username]','$password','$_POST[fullname]','$_POST[phone]','$_POST[areaId]','$_POST[areaName]','$nowTime','$dept','$zo_dept'");
	$sql->Get_admin_msg("","添加新管理员成功");
	}
	
?>