<?php
    require_once("../config.php");
    $openid = $_POST['openid'];
    $prepay_id = $_POST['prepay_id'];
    $money = $_POST['money'];
    $name = $_POST['name'];
    $token = $_POST['token'];
    $templateid = 'tuDSVlV-b5dQFGn5neyCcTCGclLZ_Xu2fQNGtik2q4A';
    $color = '#173177';
    $value = '4545';
    $data_arr = array(
        'keyword1' => array( "value" => "我用图赏对“{$name}”进行了赞赏", "color" => $color ),
        'keyword2' => array( "value" => $money, "color" => $color ),
        'keyword3' => array( "value" => "微信支付", "color" => $color ),
        'keyword4' => array( "value" => $time, "color" => $color ),
        //这里根据你的模板对应的关键字建立数组，color 属性是可选项目，用来改变对应字段的颜色
      );
    $data = array (
        "touser"           => $openid,
        //用户的 openID，可用过 wx.getUserInfo 获取
        "template_id"      => $templateid,
        //小程序后台申请到的模板编号
        "page"             => "pages/my_reward/index",
        //点击模板消息后跳转到的页面，可以传递参数
        "form_id"          =>  $prepay_id,
        //第一步里获取到的 formID
        "data"             => $data_arr,
    
        //需要强调的关键字，会加大居中显示
      );
      $data = json_encode($data, true);  
      //小程序内发送模版消息
   $res =  p_post("https://api.weixin.qq.com/cgi-bin/message/wxopen/template/send?access_token=$token",$data);
   //公众号发送模版消息先不做了


    //模拟post请求,既可以是http也可以是https  
function p_post($url,$data){  
    $options = array(
        'http' => array(
          'method'  => 'POST',
          'header'  => 'Content-type:application/json',
          //header 需要设置为 JSON
          'content' => $data,
          'timeout' => 60
          //超时时间
        )
      );
    
      $context = stream_context_create( $options );
      $result = file_get_contents( $url, false, $context );
    
      return $result;
}  
?>