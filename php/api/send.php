<?php
	header("Content-Type: text/html;charset=utf-8"); 
	require_once("../config.php");
	error_reporting(0);
	$var = array();
	$suiji = date("YmdHis").rand(1000,9999); //随机文件名
	$tmpP = $_FILES["sendImg"]["tmp_name"];
	 $type = mime_content_type($tmpP);
	 if($type=="image/png"){
         $p.=".png";
     }
     elseif($type=="image/gif"){
         $p.=".gif";
     }
     elseif($type=="image/jpeg"){
         $p.=".jpeg";
     }
     elseif($type=="image/bmp"){
         $p.=".bmp";
     }
     elseif($type=="image/x-icon"){
         $p.=".icon";
     }
	 $url = $_POST['url'];
	move_uploaded_file($_FILES["sendImg"]["tmp_name"], "../upload/" . $suiji.$p); 
    $var['imgUrl'] = "upload/" . $suiji.$p;
	$imgUrl = $url."/upload/" . $suiji.$p;
	$uid = $_POST['uid'];
	$l_id = $_POST['l_id'];
	$sql->insert("list_img","uid,l_id,imgUrl","'$uid','$l_id','$imgUrl'");
	echo 'ok';
	//print_r($_POST);
?>