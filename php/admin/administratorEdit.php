<?php
	require_once("../config.php"); #加载数据库类
	require_once("config/adminConfig.php"); #加载公共函数
	define("PAGE","member");
	$id = $_GET['id'];
	$sql->query("select * from admin where id = '$id'");
	$row = $sql->fetch_assoc();


?>
<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->

<head>

	<meta charset="utf-8" />

	<title>会员信息编辑</title>

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



				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->

				<div class="row-fluid">

					<div class="span12">

						<div class="portlet box blue" id="form_wizard_1">

							<div class="portlet-title">

								<div class="caption">

									<i class="icon-reorder"></i> 编辑会员信息 </span>

								</div>

								<div class="tools hidden-phone">

								

									<a href="javascript:;" class="reload"></a>

									
								</div>

							</div>

							<div class="portlet-body form">

								<form action="action/administratorEdit.php" class="form-horizontal" id="submit_form" method="post">
								<input type="hidden" value="<?= $row['id']?>" name="id">
									<div class="form-wizard">
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

											

												<div class="control-group">

													<label class="control-label">用户名<span class="required">*</span></label>

													<div class="controls">

														<input type="text" class="span6 m-wrap" name="username" value="<?= $row['admin_name']?>"/>

														<span class="help-inline">请输入用户名</span>

													</div>

												</div>

												<div class="control-group">

													<label class="control-label">密码<span class="required">*</span></label>

													<div class="controls">

														<input type="password" class="span6 m-wrap" name="password" id="submit_form_password" placeholder="不修改密码则不用填"/>

														<span class="help-inline">不修改密码则不用填</span>

													</div>

												</div>

												

												

											</div>


											
											
												<div class="control-group">

													<label class="control-label">真实姓名<span class="required"></span></label>

													<div class="controls">

														<input type="text" class="span6 m-wrap" name="fullname" value="<?= $row['admin_truename']?>"/>

														<span class="help-inline"></span>

													</div>

												</div>

												<div class="control-group">

													<label class="control-label">电话号码<span class="required"></span></label>

													<div class="controls">

														<input type="text" class="span6 m-wrap" name="phone" value="<?= $row['admin_tel']?>"/>

														<span class="help-inline"></span>

													</div>

												</div>
											</div>	

											

												<div class="control-group">

													<label class="control-label">当前区域<span class="required">*</span></label>
													<div class="controls">
														
														<span class="help-inline"><?= $row['areaName']?></span>
														
													</div>
												</div>
												<!--
												<div class="control-group">

													<label class="control-label">重选区域<span class="required">*</span></label>

													<div class="controls">

														<select id="seachprov" onChange="changeComplexProvince(this.value, sub_array, 'seachcity', 'seachdistrict');" name="area1"></select>&nbsp;&nbsp;
<select id="seachcity" onChange="changeCity(this.value,'seachdistrict','seachdistrict');" name="area2"></select>&nbsp;&nbsp;
<span id="seachdistrict_div"><select id="seachdistrict" name="area3"></select></span>

															<span class="help-inline">不重选则不用填</span>

													</div>

												</div>

											-->	

												

											</div>

												<input type="hidden" id="areaId" name="areaId">
												<input type="hidden" id="areaName" name="areaName">



										</div>
</div>
</div>
										<div class="form-actions clearfix">


											<button href="javascript:;" type="submit" class="btn green" onclick="showAreaID()">

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

	<script src="media/js/form-wizard1.js"></script>     

	<script>

		jQuery(document).ready(function() {       

		   App.init();

		  FormWizard.init();

		});

	</script>

</body>

<!-- END BODY -->

</html>