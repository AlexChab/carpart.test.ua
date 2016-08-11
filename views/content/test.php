<?php
use yii\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\helpers\Url;

$data1 = [
	['id' => 11351, 'name' => 'name 1', ],
    ['id' => 2, 'name' => 'name 2',],
     ['id' => 100, 'name' => 'name 100',],
];
//$data = \app\models\Manufactures::manufacturesGet();
$data = \app\models\Tecdoc::getListManufactured();

$dataProvider = new ArrayDataProvider([
	'allModels' => $data,
	'pagination' => [
		'pageSize' => 10,
	],
	'sort' => [
		'attributes' => ['MFA_ID', 'MFA_BRAND'],
	],
]);
// print_r($dataProvider->getModels());
//print_r($dataProvider->getKeys());
//print_r($dataProvider->renderColumnGroup());
echo GridView::widget([
	'dataProvider' => $dataProvider,
	'columns'=>[
		'MFA_ID',
		'MFA_BRAND',
		['attribute' => 'data',
			'value' => function($data){
				$res = \app\models\Manufactures::manufacturesGetId($data['MFA_ID']);
				if($data['MFA_ID'] == $res['MFA_ID']){
				//	return Html::a()'<a href="/content/delmanufactures?mfa_id='.$data['MFA_ID'].'"><button type="button" class="btn btn-danger btn-xs">Удалить</button></a>';
				}

				return $data['MFA_ID']  ;

			},
		],
		[

			'class' => 'yii\grid\ActionColumn',
			'template' => '{delete}',
			'options' => [
				'width' => '70px'
			],
			'buttons' => [
				'delete' => function ($url, $model, $key) {
					return Html::a('Изменить');
				}
			]
		],
		[
			'attribute'=>'test',
			'format' => 'html',
			'value' => function($data){
				return '<a href="/content/delmanufactures?mfa_id='.$data['MFA_ID'].'"><button type="button" class="btn btn-danger btn-xs">Удалить</button></a>';
			},
		],
	],

]);
?>