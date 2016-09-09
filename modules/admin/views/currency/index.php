<?php
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Modal;

$this->title = 'Продажи - Курсы Валют';
?>
<div class="col-lg-12">
	<?php
	echo GridView::widget([

		'dataProvider' => $dataProvider,
		'tableOptions' => [
			'class' => 'table table-striped table-bordered table-condensed'
		],

		'columns' => [
			['class' => 'yii\grid\SerialColumn'],
			[
				'attribute' => 'Валюта',
				'value' => 'name',
			],
			[
				'attribute' => 'Код',
				'value' => 'code',
			],
			[
				'attribute' => 'Курс',
				'value' => 'rate',
			],
			['attribute' => 'Действие',
				'format' => 'html',
				'value' => function ($data) {
					return'	<a class="btn btn-warning btn-xs" href="/admin/currency/update?id=' . $data['id'] .' " role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>
										
										
										';
				},
			],
		],
	]);

	?>
</div>