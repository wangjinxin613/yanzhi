<?php
	require_once("../../config.php");
	require_once("../config/adminConfig.php");
	$id = $_POST['id'];
	$db = $_POST['db'];
	#执行删除操作
	$res = $sql->query("delete from {$db} where id = '$id'");
	if($res){
		$sql->Get_admin_msg("","执行删除操作成功");
	}else{
		$sql->Get_admin_msg("","执行删除操作失败");
	}
?>