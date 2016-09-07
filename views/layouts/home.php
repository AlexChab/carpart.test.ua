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
							<li class="h3"><i class="fa fa-volume-control-phone text-danger"></i> (048) <span class="text-primary">706-93-40</span> </li>
							<li class="h3"><i class="fa fa-volume-control-phone text-danger"></i> (067) <span class="text-primary">502-20-32 </span> </li>
						</ul>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<button type="button" class="btn btn-success" id="call-back">Обратный Звонок</button>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-6">
			<div class="panel-default-wrap">
				<div class="panel-body panel-body-cart">
					<a href="#" class="panel-shopcart"> </a>
					<p> Позиций : <b> 00 </b> на сумму: <b> 00 грн.</b></p>
				</div>
			</div>
<!--			<div class="input-group">-->
<!--				<input type="text" id="inputSearchArt" class="form-control" placeholder="Поиск по артикулу...">-->
<!--					<span class="input-group-btn">-->
<!--					<button id="searchArt" class="btn btn-danger" type="button">Поиск</button>-->
<!--					</span>-->
<!--			</div>-->
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="panel panel-default panel-wrap panel-group" id="accordion">
				<div class="panel-heading panel-heading-wrap h5"><i class="fa fa-car text-danger " aria-hidden="true"></i> Мой гараж <i id="my-garage" class="fa fa-chevron-down pull-right" aria-hidden="true" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"></i></div>
				<div id="collapseOne" class="panel-collapse collapse ">
					<div class="panel-body panel-body-wrap">
<!--						<div class="form-group" id="form-id-1111">-->
<!--							<div class="input-group">-->
<!--									<span class="input-group-btn">-->
<!--										<button class="btn btn-default  del-my-car" type="button" id="id-1111" data-car-info="Wolksvagen"><i class="fa fa-times text-muted" aria-hidden="true"></i> </button>-->
<!--									</span>-->
<!--								<input type="button" class="form-control  my-car  btn-success" value="Wlokswagen" >-->
<!--							</div>-->
<!--						</div>-->
<!--						<div class="form-group" id="form-id-2222">-->
<!--							<div class="input-group">-->
<!--									<span class="input-group-btn">-->
<!--										<button class="btn btn-default del-my-car " id="id-2222" type="button" data-car-info="BMW-x5"><i class="fa fa-times text-muted" aria-hidden="true" ></i> </button>-->
<!--									</span>-->
<!--								<input type="button" class="form-control  my-car"  value="BMW-X5" >-->
<!--							</div>-->
<!--						</div>-->
					</div>
				</div>
			</div>
			<div class="panel panel-default panel-wrap">
				<div class="panel-heading panel-heading-wrap h5"><i class="fa fa-cogs text-danger" aria-hidden="true"></i> Подбор запчасти по автомобилю </div>
				<div class="panel-body panel-body-wrap">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-cog text-success" aria-hidden="true"></i></span>
							<a href="/home"><input type="button" class="btn btn-primary form-control" id="selectCarBrand"  value="Выбор автомобиля" aria-describedby="basic-addon1"></a>
						</div>
					</div>
<!--					<div class="form-group">-->
<!--						<div class="input-group">-->
<!--							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-cog text-muted" aria-hidden="true"></i></span>--><?php //Html::a('','/home')?>
<!--							<input type="button" class="btn btn-primary form-control" id="selectCarBrand"  value="Год выпуска" aria-describedby="basic-addon1">-->
<!--						</div>-->
<!--					</div>-->
<!--					<div class="form-group">-->
<!--						<div class="input-group">-->
<!--							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-cog text-muted" aria-hidden="true"></i></span>-->
<!--							<input type="button" class="btn btn-primary form-control" id="selectCarBrand"  value="Модель" aria-describedby="basic-addon1">-->
<!--						</div>-->
<!--					</div>-->
<!--					<div class="form-group">-->
<!--						<div class="input-group">-->
<!--							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-cog text-muted" aria-hidden="true"></i></span>-->
<!--							<input type="button" class="btn btn-primary form-control" id="selectCarBrand"  value="Двигатель" aria-describedby="basic-addon1">-->
<!--						</div>-->
<!--					</div>-->
<!--					<div class="form-group">-->
<!--						<div class="input-group">-->
<!--							<span class="input-group-addon" id="forInputVinCode"><i class="fa fa-cog text-muted" aria-hidden="true"></i></span>-->
<!--							<input type="text" class="form-control" id="InputVinCode" name="inputVinCode"  placeholder="Вин код автомобиля" aria-describedby="forInputVinCode">-->
<!--						</div>-->
<!---->
<!--					</div>-->
				</div>
			</div>
			<div class="panel panel-default panel-wrap">
				<div class="panel-heading panel-heading-wrap h5"><i class="fa fa-cogs text-danger" aria-hidden="true"></i> Подбор запчасти по OEM номеру </div>
				<div class="panel-body panel-body-wrap">
					<div class="form-group">
<!--							<div class="input-group">-->
<!--								<span class="input-group-addon" id="forinputOriginalNumber"><i class="fa fa-search text-info" aria-hidden="true"></i></span>-->
<!--								<input type="text" class="form-control" id="inputOriginalNumber" name="inputOriginalNumber"  placeholder="Оригинальный OEM номер" aria-describedby="forInputVinCode">-->
<!--							</div>-->
						<div class="input-group">
							<input type="text" id="inputSearchOem" class="form-control" placeholder="Поиск по OEM номеру ..">
								<span class="input-group-btn">
									<button id="searchOem" class="btn btn-default" type="button"><i class="fa fa-search text-info" aria-hidden="true"></i></button>
								</span>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default panel-wrap">
				<div class="panel-heading panel-heading-wrap h5"><i class="fa fa-cogs text-danger" aria-hidden="true"></i> Подбор запчасти по артикулу </div>
				<div class="panel-body panel-body-wrap">
					<div class="form-group">
						<div class="input-group">
							<input type="text" id="inputSearchArt" class="form-control" placeholder="Поиск по артикулу...">
								<span class="input-group-btn">
									<button id="searchArt" class="btn btn-default" type="button"><i class="fa fa-search text-info" aria-hidden="true"></i></button>
								</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-9" id="contentBody">

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
		<hr>
		<div class="col-md-4 col-sm-4 col-xs-6">
			<address>
				<strong>Магазин - склад № 200</strong><br>
				65100 г.Одесса , авторынок "Успех"<br>
				пр-т. маршала Жукова 2А<br>
				<abbr title="Phone">тел:</abbr> +38(048)706-93-40 +38(067)502-20-32
			</address>

			<address>
				<strong>Почта</strong><br>
				<a href="mailto:#">pit-stop_2001@mail.ru</a>
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
			<p> Автомагазин partcar.com.ua работает со всеми покупателями мы рады помочь каждому, кто обратится к нам за помощью</p></div>
	</div>
</div>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="smallModal" id="smallModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<div >Предупреждение</div>
			</div>
			<div class="modal-body">
				Удалить элемент
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Отмена</button>
				<button type="button" class="btn btn-danger btn-sm">Удалить</button>
			</div>
		</div>
	</div>
</div>
<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage();?>