<?
    require_once("../../config.php");
    $id = $_POST['id'];

    $sql->query("select * from list where id = '$id'");
    $row = $sql->fetch_assoc();

    $tuijian = $row['tuijian'];
    if($tuijian == 1){
        $sql->update("list","tuijian = '0'","id = '$id'");
    }else{
        $sql->update("list","tuijian = '1'","id = '$id'");
        $sql->update("list","tuijian_time = '$time'","id = '$id'");
        
    }
    $sql->Get_admin_msg("","操作成功");
?>