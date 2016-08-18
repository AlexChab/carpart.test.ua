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
			'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
			'tableOptions' => [
				'class' => 'table table-striped table-bordered table-condensed'
			],
			'columns' => [
				'BRA_BRAND',
				'BRA_MFC_CODE',
				'margin',

				['attribute' => 'Действие',
					'format' => 'html',
					'value' => function ($data) {
						return '<a href="/admin/margin/changemargin?bra_id=' . $data['BRA_ID'] .' " class="text-warning">Изменить</a>';
					},
				],
			],
		]);

		?>
	</div>
</div>