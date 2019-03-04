<?php
	require_once("../config.php");
	$uid = $_POST['uid'];
	$arr = array();
	$sql->query("select * from tixian where uid = '$uid' order by id desc");
	while($row = $sql->fetch_assoc()){
		$arr[] = $row;
	}
	echo json_encode($arr);
?>