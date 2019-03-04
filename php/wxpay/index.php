<?php
/**
 * JS_API支付demo
 * ====================================================
 * 在微信浏览器里面打开H5网页中执行JS调起支付。接口输入输出数据格式为JSON。
 * 成功调起支付需要三个步骤：
 * 步骤1：网页授权获取用户openid
 * 步骤2：使用统一支付接口，获取prepay_id
 * 步骤3：使用jsapi调起支付
*/	header("Content-Type: text/html; charset=UTF8");
	include_once("WxPayPubHelper/WxPayPubHelper.php");
	error_reporting(E_ALL);
	//使用jsapi接口
	$jsApi = new JsApi_pub();
	$money = $_POST['money']*100;
	//$money = 1;
	$order_id = 'tushang'.$_POST['order_id'];

	//=========步骤1：网页授权获取用户openid============
	//通过code获得openid
	
	$openid = $_POST['openid'];

	
	//=========步骤2：使用统一支付接口，获取prepay_id============
	//使用统一支付接口
	$unifiedOrder = new UnifiedOrder_pub();
	
	//设置统一支付接口参数
	//设置必填参数
	//appid已填,商户无需重复填写
	//mch_id已填,商户无需重复填写
	//noncestr已填,商户无需重复填写
	//spbill_create_ip已填,商户无需重复填写
	//sign已填,商户无需重复填写
	$unifiedOrder->setParameter("openid","$openid");//商品描述
	$unifiedOrder->setParameter("body","打赏图片");//商品描述
	$unifiedOrder->setParameter("sign_type","MD5");//商品描述
		$unifiedOrder->setParameter("device_info","WEB");//商品描述
	//自定义订单号，此处仅作举例
	$timeStamp = time();

	$out_trade_no = WxPayConf_pub::APPID."$timeStamp";
	$unifiedOrder->setParameter("out_trade_no","$order_id");//商户订单号 
	$unifiedOrder->setParameter("total_fee","$money");//总金额
	$unifiedOrder->setParameter("notify_url",WxPayConf_pub::NOTIFY_URL);//通知地址 
	$unifiedOrder->setParameter("trade_type","JSAPI");//交易类型
	//非必填参数，商户可根据实际情况选填
	//$unifiedOrder->setParameter("sub_mch_id","XXXX");//子商户号  
	//$unifiedOrder->setParameter("device_info","XXXX");//设备号 
	//$unifiedOrder->setParameter("attach","XXXX");//附加数据 
	//$unifiedOrder->setParameter("time_start","XXXX");//交易起始时间
	//$unifiedOrder->setParameter("time_expire","XXXX");//交易结束时间 
	//$unifiedOrder->setParameter("goods_tag","XXXX");//商品标记 
	//$unifiedOrder->setParameter("openid","XXXX");//用户标识
	//$unifiedOrder->setParameter("product_id","XXXX");//商品ID
	$arr = array();
	$arr['prepay_id'] = $unifiedOrder->getPrepayId();
	$arr['nonce_str']=$unifiedOrder->parameters["nonce_str"]; 
	$arr['timeStamp'] = (String)$timeStamp;
	$stringA="appId=".WxPayConf_pub::APPID."&nonceStr=$arr[nonce_str]&package=".'prepay_id='."$arr[prepay_id]&signType=MD5&timeStamp=$timeStamp";
	$stringSignTemp="$stringA&key=".WxPayConf_pub::KEY;  
	
    $sign=MD5($stringSignTemp);  
	 $arr['sign']=strtoupper($sign);  
	echo json_encode($arr);
	//echo $jsApiParameters;
?>

