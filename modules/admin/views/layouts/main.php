<?php
use app\assets\AdminAsset;
use yii\helpers\Html;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>
	<title>Управление сайтом - partcar</title>
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/metisMenu.min.css" rel="stylesheet">
		<!-- <link href="../dist/css/timeline.css" rel="stylesheet"> -->
		<link href="/css/sb-admin-2.css" rel="stylesheet">
	<!--	<link href="/css/dataTables.bootstrap.css" rel="stylesheet">-->
	<!-- DataTables Responsive CSS -->
	<!--	<link href="/css/dataTables.responsive.css" rel="stylesheet">-->
	<!-- Morris Charts CSS -->
	<!-- <link href="../bower_components/morrisjs/morris.css" rel="stylesheet"> -->
	<!-- Custom Fonts -->
	<link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!--	<link href="/css/main.css" rel="stylesheet" type="text/css">-->
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<!--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>-->
	<!--<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>-->
	<![endif]-->
</head>
<body>
<?php $this->beginBody() ?>
<div id="wrapper">
	<!-- Navigation -->
	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.html">partcar.com.ua </a>
		</div>
		<!-- /.navbar-header -->

		<ul class="nav navbar-top-links navbar-right">
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
				</a>
				<ul class="dropdown-menu dropdown-user">
					<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
					</li>
					<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
					</li>
					<li class="divider"></li>
					<li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
					</li>
				</ul>
				<!-- /.dropdown-user -->
			</li>
			<!-- /.dropdown -->
		</ul>
		<!-- /.navbar-top-links -->

		<div class="navbar-default sidebar" role="navigation">
			<div class="sidebar-nav navbar-collapse">
				<ul class="nav" id="side-menu">

					<li>
						<a href="#"><i class="fa fa-television fa-fw"></i>Контент<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li>
								<a href="/admin/content/contentmfa">Производители</a>
							</li>
							<li>
								<a href="/admin/content/contentsupl">Брэнды</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="fa fa-usd fa-fw"></i>Продажи<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li>
								<a href="/admin/margin">Наценка Брэнды</a>
							</li>
							<li>
								<a href="/admin/suppliers">Поставщики</a>
							</li>
							<li>
								<a href="/admin/currency">Курс валют</a>
							</li>

							<li>
									<a href="#">Прайсы<span class="fa arrow"></span></a>
									<ul class="nav nav-second-level">
										<li>
											<a href="/admin/import">Импорт прайсов</a>
										</li>
										<li>
											<a href="/admin/import/file">Импорт прайса из файла</a>
										</li>
										<li>
											<a href="/admin/import/deleteprice">Удаление прайсов</a>
										</li>

									</ul>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<!-- /.sidebar-collapse -->
		</div>
		<!-- /.navbar-static-side -->
	</nav>

	<div id="page-wrapper">
		<?= $content?>
	</div>
	<!-- /#page-wrapper -->

</div>

<!-- /#wrapper -->

<!-- jQuery -->
<!--<script src="../bower_components/jquery/dist/jquery.min.js"></script>-->

<!-- Bootstrap Core JavaScript -->
<!--<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>-->

<!-- Metis Menu Plugin JavaScript -->
<!--<script src="/js/metisMenu.min.js"></script>-->

<!-- Morris Charts JavaScript -->
<!-- <script src="../bower_components/raphael/raphael-min.js"></script>
<script src="../bower_components/morrisjs/morris.min.js"></script>
<script src="../js/morris-data.js"></script> -->
<!--<script src="/js/jquery.dataTables.min.js"></script>-->
<!--<script src="/js/dataTables.bootstrap.min.js"></script>-->
<!--<script src="/js/dataTables.responsive.js"></script>-->

<!-- Custom Theme JavaScript -->
<!--<script src="/js/sb-admin-2.js"></script>-->
<?php $this->endBody()?>
</body>

</html>




<?php $this->endPage();?>
