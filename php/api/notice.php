<?php
    require_once("../config.php");
    $notice = $_POST['notice'];
    $uid = $_POST['uid'];
    $sql->update("user","notice = '$notice'","id = '$uid'");
    echo '更改成功';
?>