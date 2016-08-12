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
			'format' => 'html',
			'value' => function($data){
				$res = \app\models\Manufactures::manufacturesGetId($data['MFA_ID']);
				if($data['MFA_ID'] == $res['MFA_ID']){
					return '<a href="/content/delmanufactures?mfa_id='.$data['MFA_ID'].'">Удалить</a>';
				}
					return '<a href="/content/addmanufactures?mfa_id='.$data['MFA_ID'].'&mfa_brand='.$data['MFA_BRAND'].'">Добавить</a>';
			},
		],
	],
]);
?>