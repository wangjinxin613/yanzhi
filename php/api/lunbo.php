<?php
	require_once("../config.php");
	$sql->query("select * from lunbo order by shunxu desc");
	$arr = array();
	while($row = $sql->fetch_assoc()){
		$arr[] = $row;
	}
	echo json_encode($arr);
?>