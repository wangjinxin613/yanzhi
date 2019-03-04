<?php
	header("Content-Type: text/html;charset=utf-8"); 
	require_once("../WXBizDataCrypt.php");
	require_once("../config.php");
	$content = file_get_contents ( 'php://input' );
        $content=json_decode($content,true);
	
        $utoken=$content["utoken"];

        if(!empty($utoken)&&S($utoken)){
            $result["success"]=1;
            $result['utoken']=$utoken;
            echo json_encode($result);
            exit();
        }

        $code=$_POST["code"];
	
        $encryptedData=$_POST["encryptedData"];
		
        $iv = $_POST['iv'];
	
		/*获取session_key*/
        $s_result=getSession($code);
		
        $WxData = new WXBizDataCrypt($s_result['appid'],$s_result['session_key']);

		/*解密用户数据*/
        $errCode = $WxData->decryptData($encryptedData, $iv, $user_data);
        $wxap_key = md5(uniqid(md5(microtime(true)),true));
        $result=array();
        if($errCode==0){
            $user_data=json_decode($user_data,true);
            $result["success"]=1;
            $result['utoken']=$wxap_key;
            $user_id = wxUserAdd($user_data);
          
            echo json_encode($user_id);
            exit();
        }else{
            $result["success"]=-1;
            $result['errCode']=$errCode;
            $result['msg']="获取用户信息出错！";
            echo json_encode($result);
            exit();
        }
	
	function getSession($code) {
        $s_data['appid'] = 'wx516f37a4da9dab5b';
        $s_data['secret'] = '01cc999e70489ca2e244cee5cf1801cf';
        $s_data['js_code'] = $code;
        $s_data['grant_type']="authorization_code";
        $session_url = 'https://api.weixin.qq.com/sns/jscode2session?' . http_build_query ( $s_data );
        $content = file_get_contents ( $session_url );
        $content = json_decode ( $content, true );
        $content['appid']=$s_data['appid'];
        return $content;
		
    }
    /*插入小程序用户*/
    function wxUserAdd($data){
		global $sql;
		$sql->query("select count(*) count from user where openId = '$data[openId]'");
		$row = $sql->fetch_assoc(); 
		if($row['count'] == 0){
			//首次登陆，需要注册的
			$sql->insert("user","openId,nickName,gender,city,province,country,avatarUrl","'$data[openId]','$data[nickName]','$data[gender]','$data[city]','$data[province]','$data[country]','$data[avatarUrl]'");
		}else{
			//老用户
		
		}
			$sql->query("select * from user where openId = '$data[openId]'");
			$row = $sql->fetch_assoc();
			return $row;
	
    }

?>