<?php
    $id = $_POST['id'];
	require_once("../../config.php");
	require_once("../config/adminConfig.php");
	$username = $_POST['username'];
    $sql->update("admin","admin_name = '$_POST[username]'","id = '$id'");
    if($_POST['password'] != null){
    	$password = md5(trim($_POST['password']));
        $sql->update("admin","admin_password = '$password'","id = '$id'");
    }
      $sql->update("admin","admin_truename = '$_POST[fullname]'","id = '$id'");
      $sql->update("admin","admin_tel = '$_POST[phone]'","id = '$id'");
      /**
      if(trim($_POST['areaId']) != null && trim($_POST['areaId']) != 0){
              $sql->update("admin","areaId = '$_POST[areaId]'","id = '$id'");
              $areaId = $_POST['areaId'];
              $areaIdNum = strlen($areaId);
			if($areaIdNum == '2'){
				$dept = 1;
			}else if($areaIdNum == '4'){
				$dept = 2;
			}else{
				$dept = 3;
			}
			 $sql->update("admin"," dept = '$dept'","id = '$id'");
      }
    if($_POST['areaName'] != null){
              $sql->update("admin","areaName = '$_POST[areaName]'","id = '$id'");
      }
    
		**/
	$sql->Get_admin_msg("","编辑管理员成功");

	
?>