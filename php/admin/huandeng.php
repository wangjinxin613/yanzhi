<?php
	require_once("../config.php"); #加载数据库类
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

	<title>幻灯片管理</title>

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

	<style>
			
	</style>
</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="page-header-fixed">

	<!-- BEGIN HEADER -->

	<?require_once("head.php");?>

						<!-- END BEGIN STYLE CUSTOMIZER -->  

						<!-- BEGIN PAGE TITLE & BREADCRUMB-->

						<h3 class="page-title">

						    幻灯片列表 <small>Images list</small>

						</h3>

						<ul class="breadcrumb">

							<li>

								<i class="icon-home"></i>

								<a href="index.html">主页</a> 

								<i class="icon-angle-right"></i>

							</li>

							<li>

								<a href="#">内容管理</a>

								<i class="icon-angle-right"></i>

							</li>

							<li><a href="#">幻灯片列表</a></li>

						</ul>

						<!-- END PAGE TITLE & BREADCRUMB-->

					</div>

				</div>

				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->

				<div class="row-fluid">

					<div class="span12">

						<!-- BEGIN EXAMPLE TABLE PORTLET-->

						

						<!-- END EXAMPLE TABLE PORTLET-->

						<!-- BEGIN EXAMPLE TABLE PORTLET-->

						<div class="portlet box blue">

							<div class="portlet-title">

								<div class="caption"><i class="icon-globe"></i>幻灯片列表</div>

								<div class="actions">

									<div class="btn-group">

										<a class="btn" href="#" data-toggle="dropdown">

										字段栏目

										<i class="icon-angle-down"></i>

										</a>

										<div id="sample_2_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">

											<label><input type="checkbox" checked data-column="0">ID</label>

											<label><input type="checkbox" checked data-column="1">标题</label>

											<label><input type="checkbox" checked data-column="2">更新时间</label>

											<label><input type="checkbox" checked data-column="3">属性</label>

											<label><input type="checkbox" checked data-column="4">发布人</label>

										</div>

									</div>

								</div>

							</div>

							<div class="portlet-body">

								<table class="table table-bordered table-striped table-bordered table-hover table-full-width" id="sample_2">

									<thead>

										<tr>
										
								
											<th>ID</th>
											<th>顺序</th>

											<th>幻灯片</th>
											<th>指向链接</th>

											<th style="width:10%">操作</th>

										</tr>

									</thead>

									<tbody>
										<?php
									$sql->query("select * from lunbo order by shunxu desc");
									while($row = $sql->fetch_assoc()){
									?>
										<tr>

								

											<td><?= $row['id']?></td>

											

											<td><?= $row['shunxu']?></td>

											<td ><img src="<?= $row['url']?>" style="width:250px;"></td>

											<td><?= $row['web_url']?></td>
											<td class="hidden-480">
										<form action="action/huandengDel.php" method="POST">
                                        <input value="<?= $row['id']?>" type="hidden" name="id">
                                        <button type="button" onclick='edit("huandengEdit.php?id=<?= $row['id']?>")' class="btn yellow mini" ><i>编辑</i></button>
									    <button type="submit" class="btn yellow mini" ><i>删除</i></button>
									</form>
											</td>

										</tr>
										<?}?>
										
									</tbody>

								</table>

							</div>

						</div>

						<!-- END EXAMPLE TABLE PORTLET-->

					</div>

				</div>

				<!-- END PAGE CONTENT-->

			</div>

			<!-- END PAGE CONTAINER-->

		</div>

		<!-- END PAGE -->

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

	<script type="text/javascript" src="media/js/select2.min.js"></script>

	<script type="text/javascript" src="media/js/jquery.dataTables.js"></script>

	<script type="text/javascript" src="media/js/DT_bootstrap.js"></script>

	<!-- END PAGE LEVEL PLUGINS -->

	<!-- BEGIN PAGE LEVEL SCRIPTS -->

	<script src="media/js/app.js"></script>

	<script src="media/js/table-advanced.js"></script>    
	<script src="media/js/table-managed.js"></script>      
	<script src="layer/layer.js"></script>
	<script>

		jQuery(document).ready(function() {       

		   App.init();

		   TableAdvanced.init();

		});
		function edit(url){
			layer.open({
  			type: 2, 
  			title:"内容",
  			  area: ['800px', '505px'],
  			content: url //这里content是一个URL，如果你不想让iframe出现滚动条，你还可以content: ['http://sentsin.com', 'no']
			}); 
		}
	</script>

</body>

<!-- END BODY -->

</html>