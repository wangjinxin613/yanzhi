<?
    require_once("../../config.php");
    $id = $_POST['id'];

  
        $sql->update("tixian","status = '1'","id = '$id'");
 
    $sql->Get_admin_msg("","操作成功");
?>