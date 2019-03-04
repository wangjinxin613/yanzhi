<?php
    $id = $_POST['id'];
	require_once("../../config.php");
	require_once("../config/adminConfig.php");
	
      $sql->update("user","money = '$_POST[money]'","id = '$id'");
      $sql->update("user","lj_money = '$_POST[lj_money]'","id = '$id'");
      $sql->update("user","lj_ci = '$_POST[lj_ci]'","id = '$id'");
    	
    $sql->Get_admin_msg("","编辑会员成功");

	
?>