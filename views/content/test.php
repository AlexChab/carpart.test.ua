<?php
use yii\grid\GridView;
?>
	<h3>test</h3>
<?php
echo GridView::widget([
		'dataProvider' => $dataProvider,
		'filterPosition' => 'FILTER_POS_FOOTER',
		'tableOptions' => [
				'class' => 'table table-bordered table-hover table-condensed'
		],

		'columns' => [
				[
						'header' => 'Идентификатор',
						'value' => 'MFA_ID',
				],
				[
						'header' => 'Производитель',
						'value' => 'MFA_BRAND',
				],
				[
						'header' => 'Действие',
						'value' => function() {
							if('MFA_ID' == '11351'){
								return 'ok';
							}
						return 'not';


						},
				],


//					['class' => 'yii\grid\ActionColumn'],
		],


]);

?>