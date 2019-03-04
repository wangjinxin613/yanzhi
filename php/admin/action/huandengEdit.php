<?php
	require_once("../../config.php");
		require_once("../config/adminConfig.php");
      $id = $_POST['id'];
	#缩略图上传
    if($_FILES["img"]["name"] != null){
        	move_uploaded_file($_FILES["img"]["tmp_name"],
        	"../../upload/" . $_FILES["img"]["name"]);
	        $img = "http://uolol.com/upload/" . $_FILES["img"]["name"];
             $sql->update("lunbo","url = '$img'","id = '$id'");
    }

  
	#完毕
    $sql->update("lunbo","shunxu = '$_POST[shunxu]'","id = '$id'");
    $sql->update("lunbo","web_url = '$_POST[web_url]'","id = '$id'");
   
   

			$sql->Get_admin_msg("","操作成功");
	

?>