<?php
	#后台公共加载方法
	session_start();
	header("Content-Type: text/html; charset=utf8");

	//error_reporting(0); #屏蔽错误
	#验证后台登录是否成功
	if($_SESSION['admin_id'] == null){
			header('location:login.html');
		//print_r($_SESSION);
	}
 	
	#admin 获取角色信息
	 class userinfo{
	 	//获取会员信息
	 	public $id;
	 	public $name;
		public $password; //用户密码
	 	public $truename; //真实姓名
	 	public $tel; //移动电话
	 	public $email; //电子邮
	 	public $createTime; //注册时间
    	public $status; //检测管理员账户是否启用
    	public $areaId; //区域ID
    	public $areaName; //区域名称
    	public $dept; //权限级别 0.总管 1.省级 2.市级 3.县级
    	public $zo_dept; //是否为区域总管 0.不是 1.是 
	 }
	 $admin = new userinfo();
	 $admin_id = $_SESSION['admin_id'];
	 $result1 = mysql_query("SELECT * FROM admin where id = '$admin_id'");
	 while($v = mysql_fetch_array($result1))
	 {
	 	$admin->id = $v['id'];
	 	$admin->name = $v['admin_name'];
		$admin->password = $v['admin_password'];
	 	$admin->truename = $v['admin_truename'];
	 	$admin->tel = $v['admin_tel'];
	 	$admin->email = $v['admin_email'];
	 	$admin->creatTime = $v['createTime'];
	  	$admin->status = $v['admin_status'];
	  	$admin->areaName = $v['areaName'];
	 }
	 $nowTime = date("Y-m-d H:i");//获取当前时间

?>