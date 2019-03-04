<?
define('APPID', 'wx516f37a4da9dab5b');  
define('APPKEY', '01cc999e70489ca2e244cee5cf1801cf');  
define('WX','gh_743126a2ece1');  


//获取凭据access_token  
function at(){  
    //如果缓存文件存在并且是7200秒之内更新的就直接读取缓存文件  
    if(file_exists('./at') && time()-filemtime('./at')<7200){  
        return file_get_contents('./at');  
    }  
    //以get方式请求  
    $ret = file_get_contents('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.APPID.'&secret='.APPKEY.'');  
    //把json转为数组,第二个参数为true返回数组,false返回对象  
    $ret = json_decode($ret,true);  
    //写入文件  
    file_put_contents('./at', $ret['access_token']);  
    return $ret['access_token'];  
	
}  
  $token = at();
    echo $token;
  //  qrcode("3");
//生成二维码  
function qrcode($id){  
	global $token;
    $data = '{"page":"pages/index/index","scene": "'.$id.'","width":"430"}';  
    $ret = p_post('https://api.weixin.qq.com/wxa/getwxacodeunlimit?access_token='.$token,$data);  
    
    //根据ticket获取图片  
 //   $img = file_get_contents('https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket='.UrlEncode($ret['ticket']));  
        fopen("../erweima/$id.png", "w");
    echo file_put_contents("../erweima/$id.png",$ret);
    
}
  
//模拟post请求,既可以是http也可以是https  
function p_post($url,$data,$https=true){  
    $curl = curl_init(); //启动一个CURL会话  
    curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址  
    if($https){  
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); //对认证证书来源的检测  
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2); //从证书中检查SSL加密算法是否存在  
    }  
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); //模拟用户使用的浏览器  
    curl_setopt($curl, CURLOPT_POST, 1); //发送一个常规的post请求  
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data); //post提交的数据包  
    curl_setopt($curl, CURLOPT_TIMEOUT, 30); //设置超时限制防止死循环  
    curl_setopt($curl, CURLOPT_HEADER, 0); //显示返回的header区域内容  
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); //获取的信息以文件流的形式返回  
    $tmpInfo = curl_exec($curl); //执行操作  
    curl_close($curl); //关闭curl会话  
    return $tmpInfo; //返回数据  
}  
?>