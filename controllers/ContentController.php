<?php
/**
 * Created by PhpStorm.
 * User: service
 * Date: 04.08.2016
 * Time: 12:56
 */

namespace app\controllers;


use Yii;
use app\models\Tecdoc;
use app\models\Manufactures;
use yii\grid\GridView;
//use yii\data\ActiveDataProvider;
//use yii\db\Query;
use yii\data\ArrayDataProvider;

class ContentController extends AppController
{
	public $layout = 'content';
	
	public function actionIndex()
	{
		$data_tecdoc = Tecdoc::getListManufactured();
		$data_site = Manufactures::manufacturesGet();
		return $this->render('index', array('data_tecdoc' => $data_tecdoc, 'data_site' => $data_site));
	}
	
	public function actionMantable()
	{
		$data = Tecdoc::getListManufactured();
		return $this->render('index', array('data' => $data));
	}
	
	public function actionGetmanufactures()
	{
		$data = Manufactures::manufacturesGet();
		return ($data);
		
	}
	public function actionTest(){

		$dataProvider = new ArrayDataProvider([
			'allModels' => Tecdoc::getListManufactured(),
			'pagination' => [
				'pageSize' => 20,
			],
		]);
//		print_r($dataProvider);
		return $this->render('test',['dataProvider' => $dataProvider ]);
//		echo GridView::widget([
//			'dataProvider' => $dataProvider,
//			'columns' => [
//				'MFA_ID',
//				'MFA_BRAND',
//
//			],
//		]);


	}
	
	public function actionAddmanufactures()
	{
		$request = Yii::$app->request;
		$data['mfa_id'] = $request->get('mfa_id');
		$data['mfa_brand'] = $request->get('mfa_brand');
		Manufactures::manufacturesAdd($data);
		$data_tecdoc = Tecdoc::getListManufactured();
		$data_site = Manufactures::manufacturesGet();
		return $this->render('index', array('data_tecdoc' => $data_tecdoc, 'data_site' => $data_site));

	}
	
	public function actionDelmanufactures()
	{
		$request = Yii::$app->request;
		$mfa_id = $request->get('mfa_id');
		Manufactures::manufacturesDel($mfa_id);
		$data_tecdoc = Tecdoc::getListManufactured();
		$data_site = Manufactures::manufacturesGet();
		return $this->render('index', array('data_tecdoc' => $data_tecdoc, 'data_site' => $data_site));
	}
	
	
}