<?
    require_once("../config.php");
    require_once("config/adminConfig.php"); #加载公共函数
    $id = $_GET['id'];
    $sql->query("select * from list_img where l_id = '$id'");

    while($row = $sql->fetch_assoc()){

?>
    <img src="<?= $row['imgurl']?>" style="width:350px;float:left;margin-left:10px;margin-top:10px;">
<?}?>