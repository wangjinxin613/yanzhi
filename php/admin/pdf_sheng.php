<?php
	require_once("../class/mysql_class.php"); #加载数据库类
	require_once("config/adminConfig.php"); #加载公共函数
	define("PAGE","pdf");
	

?>
<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->

<head>

	<meta charset="utf-8" />

	<title>生成省级白皮书</title>

	<meta content="width=device-width, initial-scale=1.0" name="viewport" />

	<meta content="" name="description" />

	<meta content="" name="author" />

	<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="media/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

	<link href="media/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>

	<link href="media/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

	<link href="media/css/style-metro.css" rel="stylesheet" type="text/css"/>

	<link href="media/css/style.css" rel="stylesheet" type="text/css"/>

	<link href="media/css/style-responsive.css" rel="stylesheet" type="text/css"/>

	<link href="media/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>

	<link href="media/css/uniform.default.css" rel="stylesheet" type="text/css"/>

	<!-- END GLOBAL MANDATORY STYLES -->

	<!-- BEGIN PAGE LEVEL STYLES -->

	<link rel="stylesheet" type="text/css" href="media/css/bootstrap-fileupload.css" />

	<link rel="stylesheet" type="text/css" href="media/css/jquery.gritter.css" />

	<link rel="stylesheet" type="text/css" href="media/css/chosen.css" />

	<link rel="stylesheet" type="text/css" href="media/css/select2_metro.css" />

	<link rel="stylesheet" type="text/css" href="media/css/jquery.tagsinput.css" />

	<link rel="stylesheet" type="text/css" href="media/css/clockface.css" />

	<link rel="stylesheet" type="text/css" href="media/css/bootstrap-wysihtml5.css" />

	<link rel="stylesheet" type="text/css" href="media/css/datepicker.css" />

	<link rel="stylesheet" type="text/css" href="media/css/timepicker.css" />

	<link rel="stylesheet" type="text/css" href="media/css/colorpicker.css" />

	<link rel="stylesheet" type="text/css" href="media/css/bootstrap-toggle-buttons.css" />

	<link rel="stylesheet" type="text/css" href="media/css/daterangepicker.css" />

	<link rel="stylesheet" type="text/css" href="media/css/datetimepicker.css" />

	<link rel="stylesheet" type="text/css" href="media/css/multi-select-metro.css" />

	<link href="media/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>

	<!-- END PAGE LEVEL STYLES -->

	<link rel="shortcut icon" href="media/image/favicon.ico" />
</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="page-header-fixed">

	<!-- BEGIN HEADER -->

	<?require_once("head.php");?>
						<!-- END BEGIN STYLE CUSTOMIZER -->  

						<!-- BEGIN PAGE TITLE & BREADCRUMB-->

						<h3 class="page-title">

							生成省年度白皮书 <small>Make Pdf</small>

						</h3>

						<ul class="breadcrumb">

							<li>

								<i class="icon-home"></i>

								<a href="index.html">主页</a> 

								<i class="icon-angle-right"></i>

							</li>

							<li>

								<a href="#">白皮书管理</a>

								<i class="icon-angle-right"></i>

							</li>

							<li><a href="#">生成省年度白皮书</a></li>

						</ul>

						<!-- END PAGE TITLE & BREADCRUMB-->

					</div>

				</div>
		<div class="row-fluid">

					<div class="span12">

						<!-- BEGIN PORTLET-->   

						<div class="portlet box green">

							<div class="portlet-title">

								<div class="caption"><i class="icon-reorder"></i>生成省年度白皮书</div>

								<div class="tools">

									<a href="javascript:;" class="collapse"></a>

									<a href="#portlet-config" data-toggle="modal" class="config"></a>

									<a href="javascript:;" class="reload"></a>

									<a href="javascript:;" class="remove"></a>

								</div>

							</div>

							<div class="portlet-body form">

								<!-- BEGIN FORM-->
<div class="alert">

									<button class="close" data-dismiss="alert"></button>

									<strong>警告!</strong> 白皮书生成过程中可能有点慢，请耐心等待.

								</div>
								<form action="action/export_sheng.php" class="form-horizontal" method="post">

									
									<div class="control-group" 	>

										<label class="control-label">选择模块</label>

										<div class="controls" >

											<select multiple="multiple" id="my_multi_select2" name="item[]">

												<optgroup label="选择全部">

													<option value="1">（一）2016年电商交易额、网络零售额及同比</option>

													<option value="2">（二）2016年全国电子商务交易额行政区域排行</option>

													<option value="3">（三）2016年全国网络零售额行政区域排行</option>

													<option value="4">（四）2016年全省网络零售额季度环比变化</option>
													<option value="5">（五）2016年全省网络零售额各地级市排名</option>
													<option value="6">（六）2016年全省网络零售不同行政区域交易额分布
</option>
													<option value="7">（七）2016年全省网络零售额变化趋势
</option>
													<option value="8">（八）2016年全省网络零售额环比增长率
</option>
													<option value="9">（九）2016年全省主要经济指标比较
</option>
													<option value="10">（十）2016年全省网络零售不同模式交易额分布
</option>
													<option value="11">（十一）2016年全省网络零售不同模式交易额环比
</option>
													<option value="12">（十二）2016年全省网络零售不同行业交易额占比
</option>
													<option value="13">（十三）2016年全省网络零售不同行业交易额分布
</option>
													<option value="14">（十四）2016年全省网络零售不同模式店铺数量分布与变化
</option>
													<option value="15">（十五）2016年全省网络零售不同模式店铺数量
</option>
													<option value="16">（十六）2016年全省网络零售不同模式平均单店交易额环比变化
</option>
													<option value="17">（十七）2016年全省网络零售B2C店铺交易额TOP30
</option>
													<option value="18">（十八）2016年全省网络零售C2C店铺交易额TOP30
</option>
													<option value="19">（十九）2016年各市电商综合发展-单店交易指数
</option>
													<option value="20">（二十）2016年各市电商综合发展-网商密度指数
</option>
													<option value="21">（二十一）2016年各市电商综合发展-网商活跃度
</option>
													<option value="22">（二十二）2016年各市电商综合发展-农产品销售排名
</option>
													<option value="23">（二十三）2016年全省网络零售行业解析-服装鞋包
</option>
													<option value="24">（二十四）2016年全省网络零售行业解析-手机数码
</option>
													<option value="25">（二十五）2016年全省网络零售行业解析-家居建材
</option>
													<option value="26">（二十六）各市服装鞋包、手机数码2016年网络零售额排名
</option>
													<option value="27">（二十七）各市家居建材、生活服务2016年网络零售额排名
</option>
													<option value="28">（二十八）各市百货食品、母婴用品2016年网络零售额排名
</option>
													<option value="29">（二十九）各市家用电器、运动户外2016年网络零售额排名
</option>
													<option value="30">（三十）各市美妆饰品、游戏话费2016年网络零售额排名
</option>
													<option value="31">（三十一）各市文化玩乐、其他行业2016年网络零售额排名
</option>
													<option value="32">（三十二）2016年南京市网络零售分析
</option>
													<option value="33">（三十三）2016年苏州市网络零售分析
</option>
													<option value="34">（三十四）2016年南通市网络零售分析
</option>
													<option value="35">（三十五）2016年无锡市网络零售分析
</option>
													<option value="36">（三十六）2016年常州市网络零售分析
</option>
													<option value="37">（三十七）2016年徐州市网络零售分析
</option>
													<option value="38">（三十八）2016年扬州市网络零售分析
</option>
													<option value="39">（三十九）2016年连云港市网络零售分析
</option>
													<option value="40">（四十）2016年镇江市网络零售分析
</option>
													<option value="41">（四十一）2016年宿迁市网络零售分析
</option>
													<option value="42">（四十二）2016年泰州市网络零售分析
</option>
													<option value="43">（四十三）2016年盐城市网络零售分析
</option>
													<option value="44">（四十四）2016年淮安市网络零售分析
</option>

												</optgroup>


											</select>

										</div>

									</div>

							
<div class="form-actions">

										<button type="submit" class="btn blue">确定生成</button>                            

									</div>
								<!-- END FORM-->  
	</form>
							</div>

						</div>

						<!-- END PORTLET-->

					</div>

				</div>
				</div>

</div>

	<!-- END CONTAINER -->

	<!-- BEGIN FOOTER -->

	<? require_once("foot.php");?>
	<!-- END FOOTER -->

	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

	<!-- BEGIN CORE PLUGINS -->

	<script src="media/js/jquery-1.10.1.min.js" type="text/javascript"></script>

	<script src="media/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>

	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->

	<script src="media/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      

	<script src="media/js/bootstrap.min.js" type="text/javascript"></script>

	<!--[if lt IE 9]>

	<script src="media/js/excanvas.min.js"></script>

	<script src="media/js/respond.min.js"></script>  

	<![endif]-->   

	<script src="media/js/jquery.slimscroll.min.js" type="text/javascript"></script>

	<script src="media/js/jquery.blockui.min.js" type="text/javascript"></script>  

	<script src="media/js/jquery.cookie.min.js" type="text/javascript"></script>

	<script src="media/js/jquery.uniform.min.js" type="text/javascript" ></script>

	<!-- END CORE PLUGINS -->

	<!-- BEGIN PAGE LEVEL PLUGINS -->

	<script type="text/javascript" src="media/js/ckeditor.js"></script>  

	<script type="text/javascript" src="media/js/bootstrap-fileupload.js"></script>

	<script type="text/javascript" src="media/js/chosen.jquery.min.js"></script>

	<script type="text/javascript" src="media/js/select2.min.js"></script>

	<script type="text/javascript" src="media/js/wysihtml5-0.3.0.js"></script> 

	<script type="text/javascript" src="media/js/bootstrap-wysihtml5.js"></script>

	<script type="text/javascript" src="media/js/jquery.tagsinput.min.js"></script>

	<script type="text/javascript" src="media/js/jquery.toggle.buttons.js"></script>

	<script type="text/javascript" src="media/js/bootstrap-datepicker.js"></script>

	<script type="text/javascript" src="media/js/bootstrap-datetimepicker.js"></script>

	<script type="text/javascript" src="media/js/clockface.js"></script>

	<script type="text/javascript" src="media/js/date.js"></script>

	<script type="text/javascript" src="media/js/daterangepicker.js"></script> 

	<script type="text/javascript" src="media/js/bootstrap-colorpicker.js"></script>  

	<script type="text/javascript" src="media/js/bootstrap-timepicker.js"></script>

	<script type="text/javascript" src="media/js/jquery.inputmask.bundle.min.js"></script>   

	<script type="text/javascript" src="media/js/jquery.input-ip-address-control-1.0.min.js"></script>

	<script type="text/javascript" src="media/js/jquery.multi-select.js"></script>   

	<script src="media/js/bootstrap-modal.js" type="text/javascript" ></script>

	<script src="media/js/bootstrap-modalmanager.js" type="text/javascript" ></script> 

	<!-- END PAGE LEVEL PLUGINS -->

	<!-- BEGIN PAGE LEVEL SCRIPTS -->

	<script src="media/js/app.js"></script>

	<script src="layer/layer.js"></script>

	<script src="media/js/form-components.js"></script>     
	<script>

		jQuery(document).ready(function() {       

		   App.init();

		   FormComponents.init();
		});
		function edit(url){
			layer.open({
  			type: 2, 
  			title:"编辑会员信息",
  			  area: ['800px', '505px'],
  			content: url //这里content是一个URL，如果你不想让iframe出现滚动条，你还可以content: ['http://sentsin.com', 'no']
			}); 
		}
	</script>

</body>

<!-- END BODY -->

</html>