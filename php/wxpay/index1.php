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
	include_once("../conn.php");
	//使用jsapi接口
	$jsApi = new JsApi_pub();
	session_start();
	$money = $_POST['money']*100;
	$order_id = $_POST['order_id'];
	$res = mysql_query("select * from chongzhi where id = '$order_id'");
	$row = mysql_fetch_assoc($res);

	
	if($_POST['money'] != $row['money']){
		echo '非法操作';
		exit();
	}
	//=========步骤1：网页授权获取用户openid============
	//通过code获得openid
	
	$openid = $_SESSION['openid'];

	
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
	$unifiedOrder->setParameter("body","闲竞游戏币");//商品描述
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

	$prepay_id = $unifiedOrder->getPrepayId();
	
	//=========步骤3：使用jsapi调起支付============
	$jsApi->setPrepayId($prepay_id);

	$jsApiParameters = $jsApi->getParameters();
	//echo $jsApiParameters;
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <title>微信安全支付</title>
	<script src="../js/jquery-1.8.1.min.js"></script>
		<script type="text/javascript">
					$(function () {
							(function longPolling() {
									//alert(Date.parse(new Date())/1000);
									$.ajax({
										  url: "check.php",
										  	type : "POST",
											data: {id:"<?echo $order_id;?>"},
											dataType: "text",
											timeout: 5000,//5秒超时，可自定义设置
											error: function (XMLHttpRequest, textStatus, errorThrown) {
													
													
													if (textStatus == "timeout") { // 请求超时
															longPolling(); // 递归调用
													} else { // 其他错误，如网络错误等
															longPolling();
													}
											},
											success: function (data, textStatus) {
													if(data == 'success'){
														//alert("支付成功");
														window.location.href="deal.php?id=<?echo $order_id;?>";
													}
													
													//$("#test").append(data);
													if (textStatus == "success") { // 请求成功
															longPolling();
													}
											}
									});

							})();
					});
			</script>
	<script type="text/javascript">
	//调用微信JS api 支付
	function jsApiCall()
	{
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',
			<?php echo $jsApiParameters; ?>,
			function(res){
				WeixinJSBridge.log(res.err_msg);
				//alert(res.err_code+res.err_desc+res.err_msg);
			}
		);
	}

	function callpay()
	{
		if (typeof WeixinJSBridge == "undefined"){
		    if( document.addEventListener ){
		        document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
		    }else if (document.attachEvent){
		        document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
		        document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
		    }
		}else{
		    jsApiCall();
		}
	}
		callpay();
	</script>
	<script type="text/javascript">
	//获取共享地址
	function editAddress()
	{
		WeixinJSBridge.invoke(
			'editAddress',
			<?php echo $editAddress; ?>,
			function(res){
				var value1 = res.proviceFirstStageName;
				var value2 = res.addressCitySecondStageName;
				var value3 = res.addressCountiesThirdStageName;
				var value4 = res.addressDetailInfo;
				var tel = res.telNumber;
				
				alert(value1 + value2 + value3 + value4 + ":" + tel);
			}
		);
	}
	
	window.onload = function(){
		if (typeof WeixinJSBridge == "undefined"){
		    if( document.addEventListener ){
		        document.addEventListener('WeixinJSBridgeReady', editAddress, false);
		    }else if (document.attachEvent){
		        document.attachEvent('WeixinJSBridgeReady', editAddress); 
		        document.attachEvent('onWeixinJSBridgeReady', editAddress);
		    }
		}else{
			editAddress();
		}
	};

	</script>
</head>
<body>
 
</body>
</html>