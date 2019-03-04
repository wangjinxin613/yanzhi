<?php
 //处理页面只有一个功能处理传过来的所有代号（省、市、区。。。）
 include("../../class/mysql_class.php");
 $db = new DBDA();
 $pcode = $_POST["pcode"];//取到赋值代号
 $sql = "select * from city where code='{$pcode}'";
$sql->query($sql);
echo $sql->fetch_assoc();
?>