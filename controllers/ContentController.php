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

class ContentController extends AppController
{
	public $layout = 'content';
	public function actionIndex(){
		$data_tecdoc = Tecdoc::getListManufactured();
		$data_site = Manufactures::manufacturesGet();
		//$this->debug($data_tecdoc);
		//$this->debug($data_site);
		return $this->render('index',array('data_tecdoc'=>$data_tecdoc,'data_site' =>$data_site));
	}
	public function actionMantable(){
		$data = Tecdoc::getListManufactured();
		return $this->render('index',array('data'=>$data));
	}
	public function actionGetmanufactures(){
		$data = Manufactures::manufacturesGet();
		return($data);

	}
	public function actionAddmanufactures(){
		$request = Yii::$app->request;
		$data['mfa_id'] = $request->get('mfa_id');
		$data['mfa_brand'] = $request->get('mfa_brand');
		$result = Manufactures::manufacturesAdd($data);
		return($result);
	}
	public function actionDelmanufactures(){
		$request = Yii::$app->request;
		$mfa_id = $request->get('mfa_id');
		$result = Manufactures::manufacturesDel($mfa_id);
		return($result);
	}
	
	
}