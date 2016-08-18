<?php
use yii\grid\GridView;
use app\models\Brands;

$this->title = 'Управление - бренды';
?>
<div class="row">
	<div class="col-lg-12">
		<h4> Управление контентом - Бренды</h4>
		<?php
		echo GridView::widget([
			'dataProvider' => $dataProvider,
			'tableOptions' => [
				'class' => 'table table-striped table-bordered table-condensed'
			],
			'columns' => [
				[
					'attribute' => 'Код',
					'value' => 'BRA_ID',
				],
				'BRA_BRAND',
				'BRA_MFC_CODE',
				['attribute' => 'Действие',
					'format' => 'html',
					'value' => function ($data) {
						$res = Brands::brandsGetId($data['BRA_ID']);
						if ($data['BRA_ID'] == $res['BRA_ID']) {
							return '<a href="/admin/content/delbrands?bra_id=' . $data['BRA_ID'] .' " class="text-warning">Удалить</a>';
						}
						return '<a href="/admin/content/addbrands?bra_id=' . $data['BRA_ID'] . '">Добавить</a>';

					},
				],
			],
		]);

		?>
	</div>
</div>
