<?php
	require_once("../../config.php");
		require_once("../config/adminConfig.php");

	#缩略图上传
    if($_FILES["img"]["name"] != null){
        	move_uploaded_file($_FILES["img"]["tmp_name"],
        	"../../upload/" . $_FILES["img"]["name"]);
	        $img = "http://uolol.com/upload/" . $_FILES["img"]["name"];
           
    }
    $shunxu = $_POST['shunxu'];
    $web_url = $_POST['web_url'];
  
	#完毕
    $sql->insert("lunbo","url,shunxu,web_url","'$img','$shunxu','$web_url'");
   

			$sql->Get_admin_msg("","操作成功");
	

?>