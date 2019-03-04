<?php
	require_once("../../class/mysql_class.php");
	require_once("../config/adminConfig.php");
	#缩略图上传
	move_uploaded_file($_FILES["img"]["tmp_name"],
	"../../upload/" . $_FILES["img"]["name"]);
	if($_FILES["img"]["name"] != null){
		$img = "upload/" . $_FILES["img"]["name"];
	}else{
		$img = "images/no_img.jpg";
	}
	
	#完毕
	$res = mysql_query("insert into news (id,title,type,img,writer,source,body,time,areaId) values (null,'$_POST[title]','$_POST[type]','$img','$_POST[writer]','$_POST[source]','$_POST[body]','$nowTime','$admin->areaId')");
	#成功跳转
	if($res){
			$sql->Get_admin_msg("","添加资讯成功");
	}else{
		$sql->Get_admin_msg("","添加资讯成功");
	}

?>