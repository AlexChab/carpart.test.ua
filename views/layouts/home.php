<?php
use app\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,600,600italic,700italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

<!--	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>-->
<!--	<script src="/js/bootstrap.min.js"></script>-->

    <?php $this->head();?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="container-fluid">
	<div class="head row">
		<div class="col-md-4 hidden-xs hidden-sm">
			<img src="/image/logo_1.png" alt="Logo">
		</div>
		<div class="col-md-4 col-sm-6">
			<div class="head-phone">
				<div class="row">
					<div class="col-md-12">
						<p class="h4">Подбор и заказ запчастей с 9-00 до 20-00 пн-пт</p>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<ul class="pull-left" >
							<li class="h3"><i class="fa fa-volume-control-phone text-danger"></i> (050) <span class="text-primary">253-33-45</span> </li>
							<li class="h3"><i class="fa fa-volume-control-phone text-danger"></i> (067)<span class="text-primary"> 253-33-45 </span> </li>
						</ul>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<button type="button" class="btn btn-success ">Обратный Звонок</button>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-6">
			<div class="panel-default-wrap">
				<div class="panel-body panel-body-cart">
					<a href="#" class="panel-shopcart"> </a>
					<p> Позиций : <b>10</b> на сумму: <b>12345 грн.</b></p>
				</div>
			</div>
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Search for...">
					<span class="input-group-btn">
					<button class="btn btn-danger" type="button">Поиск</button>
					</span>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="panel panel-default panel-wrap panel-group" id="accordion">
				<div class="panel-heading panel-heading-wrap h5"><i class="fa fa-car text-danger " aria-hidden="true"></i> Мой гараж <i id="my-garage" class="fa fa-chevron-down pull-right" aria-hidden="true" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"></i></div>
				<div id="collapseOne" class="panel-collapse collapse ">
					<div class="panel-body panel-body-wrap">
						<div class="form-group" id="form-id-1111">
							<div class="input-group">
								<input type="button" class="form-control input-sm my-car" value="Wlokswagen" >
									<span class="input-group-btn">
										<button class="btn btn-default btn-sm del-my-car" type="button" id="id-1111"><i class="fa fa-times" aria-hidden="true"></i> </button>
									</span>
							</div>
						</div>
						<div class="form-group" id="form-id-2222">
							<div class="input-group">
								<input type="button" class="form-control input-sm my-car"  value="BMW-X5" >
									<span class="input-group-btn">
										<button class="btn btn-default btn-sm del-my-car" id="id-2222" type="button"><i class="fa fa-times" aria-hidden="true"></i> </button>
									</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default panel-wrap">
				<div class="panel-heading panel-heading-wrap h5"><i class="fa fa-cogs text-danger" aria-hidden="true"></i> Выбор Автомобиля</div>
				<div class="panel-body panel-body-wrap">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-cog text-success" aria-hidden="true"></i></span>
							<a href="/home"><input type="button" class="btn btn-primary form-control" id="selectCarBrand"  value="Марка автмобиля" aria-describedby="basic-addon1"></a>
						</div>

					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-cog text-muted" aria-hidden="true"></i></span><?php Html::a('','/home')?>
							<input type="button" class="btn btn-primary form-control" id="selectCarBrand"  value="Год выпуска" aria-describedby="basic-addon1">
						</div>

						<!-- 	<label for="selectCarYearMan">Год выпуска</label>
							<select id="selectCarYearMan" class="form-control">
								<option>2000</option>
								<option>2001</option>
							</select> -->
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-cog text-muted" aria-hidden="true"></i></span>
							<input type="button" class="btn btn-primary form-control" id="selectCarBrand"  value="Модель" aria-describedby="basic-addon1">
						</div>

						<!-- <label for="selectCarYearMan">Модель</label>
						<select id="selectCarYearMan" class="form-control">
							<option>Model 1,5</option>
							<option>Model 1,6</option>
						</select> -->
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-cog text-muted" aria-hidden="true"></i></span>
							<input type="button" class="btn btn-primary form-control" id="selectCarBrand"  value="Двигатель" aria-describedby="basic-addon1">
						</div>

					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon" id="forInputVinCode"><i class="fa fa-cog text-muted" aria-hidden="true"></i></span>
							<input type="text" class="form-control" id="InputVinCode" name="inputVinCode"  placeholder="Вин код автомобиля" aria-describedby="forInputVinCode">
						</div>

					</div>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<?= Breadcrumbs::widget([
					'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
			]) ?>
<!--			<ol class="breadcrumb">-->
<!--				<li><a href="#"><i class="fa fa-home text-danger " aria-hidden="true"></i></a></li>-->
<!--				<li><a href="#">Марка</a></li>-->
<!--				<li><a href="#">Год выпуска</a></li>-->
<!--				<li> <a href="#">Модель</a> </li>-->
<!--				<li class="active">Категории</li>-->
<!--			</ol>-->
      <?= $content?>
    </div>
	</div>
	<div class="row footer">

		<div class="col-md-4 col-sm-4 col-xs-6">
			<address>
				<strong>Магазин - склад</strong><br>
				65100 г.Одесса , авторынок "Успех"<br>
				ул. Маршала Жукова 1<br>
				<abbr title="Phone">тел:</abbr> (050) 455-5578
			</address>

			<address>
				<strong>Почта</strong><br>
				<a href="mailto:#">uspex@example.com</a>
			</address>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-6">
			<ul>
				<li><a href="#"><b> Оплата Приват24</b></a></li>
				<li><a href="#"><b> Доставка</b></a></li>
				<li><a href="#"><b> Гарантия</b></a></li>
			</ul>
		</div>
		<div class="col-md-4 col-sm-4 hidden-xs">
			<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit ullam, aliquam, accusamus qui assumenda sequi aut illo ducimus corporis consequuntur magni reiciendis error magnam vitae, vel. Id excepturi ipsa at.</p></div>
	</div>
</div>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="smallModal" id="smallModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="gridSystemModalLabel">Предупреждение</h4>
			</div>
			<div class="modal-body">
				Удалить элемент
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"> Скажи Нет</button>
				<button type="button" class="btn btn-primary">ДА</button>
			</div>
		</div>
	</div>
</div>
<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage();?>