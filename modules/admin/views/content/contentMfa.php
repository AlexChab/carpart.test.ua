<?php
use yii\grid\GridView;
$this->title = 'Управление - контент автомобили';
?>
<div class="row">
	<div class="col-lg-12">
		<h4> Управление котентом - производители автомобилей </h4>
		<?php
		echo GridView::widget([
				'dataProvider' => $dataProvider,
				'tableOptions' => [
						'class' => 'table table-striped table-bordered table-condensed'
				],
				'columns' => [
						[
								'attribute' => 'Код по TECDOC',
								'value' => 'MFA_ID',
						],
						'MFA_BRAND',
						['attribute' => 'Действие',
								'format' => 'html',
								'value' => function ($data) {
									$res = \app\models\Manufactures::manufacturesGetId($data['MFA_ID']);
									if ($data['MFA_ID'] == $res['MFA_ID']) {
										return '<a href="/content/delmanufactures?mfa_id=' . $data['MFA_ID'] . '">Удалить</a>';
									}
									return '<a href="/content/addmanufactures?mfa_id=' . $data['MFA_ID'] . '&mfa_brand=' . $data['MFA_BRAND'] . '">Добавить</a>';
								},
						],
				],
		]);

		?>
	</div>
</div>
