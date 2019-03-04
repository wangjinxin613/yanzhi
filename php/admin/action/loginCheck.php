<?php
	#用于登录验证
	session_start();
	require_once("../../config.php");
	$admin_name= $_POST['admin_name'];
	$admin_password = md5($_POST['admin_password']);

	if($admin_name && $admin_password){
		$sql->query("select * from admin where admin_name = '$admin_name'");
		$result = $sql->fetch_assoc();
		
		if( $result && trim($result['admin_password']) == $admin_password) # 检验密码检验成功
		{
	
			$_SESSION['admin_id'] = $result['id'];
			$sql->Get_admin_msg("../memberList.php","");

		}
		else # 检验密码检验失败
		{
			
			exit('<script>alert(\'用户名或密码错误，无法登陆！\');history.back();</script>');
		}
	}else{
		//	 exit('<script>alert(\'非法操作！\');history.back();</script>');
	}
?>
