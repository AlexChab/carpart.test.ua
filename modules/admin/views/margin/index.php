<?php
use yii\grid\GridView;
use app\models\Brands;

$this->title = 'Управление - ценообразование бренды';
?>
<div class="row">
	<div class="col-lg-12">
		<h4> Управление - наценка Бренды</h4>
		<?php
		echo GridView::widget([
				'dataProvider' => $dataProvider,
				'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ''],
				'tableOptions' => [
						'class' => 'table table-striped table-bordered table-condensed'
				],
				'columns' => [
						[
								'attribute' => 'Код по TECDOC',
								'value' => 'BRA_ID',
								
						],
						[
								'attribute' => 'Название Брэнда',
								'value' => function ($data) {
									return $data['BRA_BRAND'];
								},

						],

						[
								'attribute' => 'Код Брэнда',
								'value' => function ($data) {
									return $data['BRA_BRAND'];
								},

						],


						[
								'attribute' => 'Наценка %',
								'contentOptions' =>['class' => 'text-danger text-center'],
								'value' => function ($data) {
									return $data['margin'];
								}
						],


						['attribute' => 'Действие',
								'format' => 'html',
								'contentOptions' =>['class' => 'text-danger text-center'],
								'value' => function ($data) {
									if (isset($data['margin'])) {
										return '<a class="btn btn-info btn-xs" href="/admin/margin/updatemargin?bra_id=' . $data['BRA_ID'] . ' " role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
										//return '<a href="/admin/margin/updatemargin?bra_id=' . $data['BRA_ID'] . ' " class="text-warning">Изменить</a>';
									}
									return '<a class="btn btn-success btn-xs" href="/admin/margin/createmargin?bra_id=' . $data['BRA_ID'] . ' " role="button"><i class="fa fa-bars" aria-hidden="true"></i></a>';
									//return '<a href="/admin/margin/createmargin?bra_id=' . $data['BRA_ID'] . ' " class="text-warning">Создать</a>';
								},
						],
				],
		]);

		?>
	</div>
</div>