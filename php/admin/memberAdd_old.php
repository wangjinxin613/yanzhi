<?php
	require_once("../class/mysql_class.php"); #加载数据库类
	require_once("config/adminConfig.php"); #加载公共函数
	define("PAGE","member");
	

?>
<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->

<head>

	<meta charset="utf-8" />

	<title>添加会员</title>

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

	<link rel="stylesheet" type="text/css" href="media/css/select2_metro.css" />

	<link rel="stylesheet" href="media/css/DT_bootstrap.css" />

	<!-- END PAGE LEVEL STYLES -->

<script src="media/js/jquery-1.7.min.js" type="text/javascript"></script>
<script src="media/js/Area.js" type="text/javascript"></script>
<script src="media/js/AreaData_min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function (){
	initComplexArea('seachprov', 'seachcity', 'seachdistrict', area_array, sub_array, '0', '0', '0');
});

//得到地区码
function getAreaID(){
	var area = 0;          
	if($("#seachdistrict").val() != "0"){
		area = $("#seachdistrict").val();                
	}else if ($("#seachcity").val() != "0"){
		area = $("#seachcity").val();
	}else{
		area = $("#seachprov").val();
	}
	return area;
}

function showAreaID() {
	//地区码
	var areaID = getAreaID();
	//地区名
	var areaName = getAreaNamebyID(areaID) ;
	$("#areaId").val(areaID);
	$("#areaName").val(areaName);
	 //权限判断
	<? if($admin->dept != 0){?>	
		
	var code = <?= $areaId?>;
	if(areaID.toString().length < code.toString().length){
		alert("所选区域不在权限范围内");
		return 0;

	}else{
		var tt = areaID.substring(0,code.toString().length);
		if(tt != code){
			alert("所选区域不在权限范围内");	
			return 0;
		}
	}
	<?}?>
	 document.getElementById("submit_form").submit();  
	　
}

//根据地区码查询地区名
function getAreaNamebyID(areaID){
	var areaName = "";
	if(areaID.length == 2){
		areaName = area_array[areaID];
	}else if(areaID.length == 4){
		var index1 = areaID.substring(0, 2);
		areaName = area_array[index1] + " " + sub_array[index1][areaID];
	}else if(areaID.length == 6){
		var index1 = areaID.substring(0, 2);
		var index2 = areaID.substring(0, 4);
		areaName = area_array[index1] + " " + sub_array[index1][index2] + " " + sub_arr[index2][areaID];
	}
	return areaName;
}
</script>

</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="page-header-fixed">

	<!-- BEGIN HEADER -->

	<?require_once("head.php");?>
	

						<h3 class="page-title">

							添加会员

							 <small>Add member</small>

						</h3>

						<ul class="breadcrumb">

							<li>

								<i class="icon-home"></i>

								<a href="index.html">主页</a> 

								<span class="icon-angle-right"></span>

							</li>

							<li>

								<a href="#">会员管理</a>

								<span class="icon-angle-right"></span>

							</li>

							<li><a href="#">添加会员</a></li>

						</ul>

					</div>

				</div>

				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->

				<div class="row-fluid">

					<div class="span12">

						<div class="portlet box blue" id="form_wizard_1">

							<div class="portlet-title">

								<div class="caption">

									<i class="icon-reorder"></i> 添加新会员 </span>

								</div>

								<div class="tools hidden-phone">

								

									<a href="javascript:;" class="reload"></a>

									
								</div>

							</div>

							<div class="portlet-body form">

								<form action="action/memberAdd.php" class="form-horizontal" id="submit_form" method="post">

									<div class="form-wizard">

										<div class="navbar steps">

											<div class="navbar-inner">

												<ul class="row-fluid">

													<li class="span3">

														<a href="#tab1" data-toggle="tab" class="step active">

														<span class="number">1</span>

														<span class="desc"><i class="icon-ok"></i> 账号密码</span>   

														</a>

													</li>

													<li class="span3">

														<a href="#tab2" data-toggle="tab" class="step">

														<span class="number">2</span>

														<span class="desc"><i class="icon-ok"></i> 基本信息</span>   

														</a>

													</li>

													<li class="span3">

														<a href="#tab3" data-toggle="tab" class="step">

														<span class="number">3</span>

														<span class="desc"><i class="icon-ok"></i> 权限设置</span>   

														</a>

													</li>

													<li class="span3">

														<a href="#tab4" data-toggle="tab" class="step">

														<span class="number">4</span>

														<span class="desc"><i class="icon-ok"></i> 完成</span>   

														</a> 

													</li>

												</ul>

											</div>

										</div>

										<div id="bar" class="progress progress-success progress-striped">

											<div class="bar"></div>

										</div>

										<div class="tab-content">

											<div class="alert alert-error hide">

												<button class="close" data-dismiss="alert"></button>

												你有一些形式错误。请检查下面.

											</div>

											<div class="alert alert-success hide">

												<button class="close" data-dismiss="alert"></button>

												Your form validation is successful!

											</div>

											<div class="tab-pane active" id="tab1">

												<h3 class="block">提供帐户的详细信息</h3>

												<div class="control-group">

													<label class="control-label">用户名<span class="required">*</span></label>

													<div class="controls">

														<input type="text" class="span6 m-wrap" name="username"/>

														<span class="help-inline">请输入用户名</span>

													</div>

												</div>

												<div class="control-group">

													<label class="control-label">密码<span class="required">*</span></label>

													<div class="controls">

														<input type="password" class="span6 m-wrap" name="password" id="submit_form_password"/>

														<span class="help-inline">请输入密码</span>

													</div>

												</div>

												<div class="control-group">

													<label class="control-label">重复密码<span class="required">*</span></label>

													<div class="controls">

														<input type="password" class="span6 m-wrap" name="rpassword"/>

														<span class="help-inline">请重复确认密码</span>

													</div>

												</div>

												

											</div>

											<div class="tab-pane" id="tab2">

												<h3 class="block">提供个人详细资料</h3>
												<div class="control-group">

													<label class="control-label">电子邮箱<span class="required"></span></label>

													<div class="controls">

														<input type="text" class="span6 m-wrap" name="email"/>

														<span class="help-inline">请输入电子邮箱</span>

													</div>

												</div>
												<div class="control-group">

													<label class="control-label">真实姓名<span class="required"></span></label>

													<div class="controls">

														<input type="text" class="span6 m-wrap" name="fullname"/>

														<span class="help-inline">请输入真实姓名</span>

													</div>

												</div>

												<div class="control-group">

													<label class="control-label">电话号码<span class="required"></span></label>

													<div class="controls">

														<input type="text" class="span6 m-wrap" name="phone"/>

														<span class="help-inline">请输入电话号码	</span>

													</div>

												</div>
											</div>	

											<div class="tab-pane" id="tab3">

												<h3 class="block">设置区域以及权限</h3>

												

												<div class="control-group">

													<label class="control-label">区域<span class="required">*</span></label>

													<div class="controls">

														<select id="seachprov" onChange="changeComplexProvince(this.value, sub_array, 'seachcity', 'seachdistrict');" name="area1"></select>&nbsp;&nbsp;
<select id="seachcity" onChange="changeCity(this.value,'seachdistrict','seachdistrict');" name="area2"></select>&nbsp;&nbsp;
<span id="seachdistrict_div"><select id="seachdistrict" name="area3"></select></span>

														<span class="help-inline"></span>

													</div>

												</div>

												

												

											</div>

											<div class="tab-pane" id="tab4">

												<h3 class="block">确认账户</h3>

												<h4 class="form-section">账号密码</h4>

												<div class="control-group">

													<label class="control-label">账号:</label>

													<div class="controls">

														<span class="text display-value" data-display="username"></span>

													</div>

												</div>

												

												<h4 class="form-section">基本信息</h4>
												<div class="control-group">

													<label class="control-label">邮箱:</label>

													<div class="controls">

														<span class="text display-value" data-display="email"></span>

													</div>

												</div>

												<div class="control-group">

													<label class="control-label">真实姓名:</label>

													<div class="controls">

														<span class="text display-value" data-display="fullname"></span>

													</div>

												</div>

												

												<div class="control-group">

													<label class="control-label">电话:</label>

													<div class="controls">

														<span class="text display-value" data-display="phone"></span>

													</div>

												</div>

											

												<h4 class="form-section">地区设置</h4>

												<div class="control-group">

													<label class="control-label">区域:</label>

													<div class="controls">

														<span class="text display-value" data-display="area1" style="float:left"></span>
														<span class="text display-value" data-display="area2" style="float:left"></span>
														<span class="text display-value" data-display="area3" style="float:left"></span>

													</div>

												</div>
												<input type="hidden" id="areaId" name="areaId">
												<input type="hidden" id="areaName" name="areaName">


											</div>

										</div>

										<div class="form-actions clearfix">

											<a href="javascript:;" class="btn button-previous">

											<i class="m-icon-swapleft"></i> 返回 

											</a>

											<a href="javascript:;" class="btn blue button-next">

											下一步 <i class="m-icon-swapright m-icon-white"></i>

											</a>

											<button href="javascript:;" type="submit" class="btn green button-submit" onclick="showAreaID()">

											提交 <i class="m-icon-swapright m-icon-white"></i>

											</button>

										</div>

									</div>

								</form>

							</div>

						</div>

					</div>

				</div>

				<!-- END PAGE CONTENT-->         

			</div>

			<!-- END PAGE CONTAINER-->

		</div>

		<!-- END PAGE -->  

	</div>

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

	<script type="text/javascript" src="media/js/jquery.validate.min.js"></script>

	<script type="text/javascript" src="media/js/additional-methods.min.js"></script>

	<script type="text/javascript" src="media/js/jquery.bootstrap.wizard.min.js"></script>

	<script type="text/javascript" src="media/js/chosen.jquery.min.js"></script>

	<script type="text/javascript" src="media/js/select2.min.js"></script>

	<!-- END PAGE LEVEL PLUGINS -->

	<!-- BEGIN PAGE LEVEL SCRIPTS -->

	<script src="media/js/app.js"></script>

	<script src="media/js/form-wizard.js"></script>     

	<script>

		jQuery(document).ready(function() {       

		   App.init();

		  FormWizard.init();

		});

	</script>

</body>

<!-- END BODY -->

</html>