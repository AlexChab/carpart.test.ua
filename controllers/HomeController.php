<?php
/**
 * Created by PhpStorm.
 * User: service
 * Date: 26.07.2016
 * Time: 15:38
 */

namespace app\controllers;

use Yii;
use app\models\Tecdoc;
use yii\web\Controller;


class HomeController extends AppController
{
	public $layout = 'home';
	public function actionIndex(){
		$data = Tecdoc::getListManufactured();
		return $this->render('carList',compact('data'));
	}
	public function actionCarlist(){

	}
	public function actionManfcar(){
		$year = '199501';
		$request = Yii::$app->request;
		$id = $request->get('manid');
		$data = Tecdoc::getManufacturedCar($id,$year);
		return $this->render('manfcar',compact('data'));
		//$this->debug($data);
	}
	public function actionCarmodel(){
		$request = Yii::$app->request;
		$id = $request->get('carid');
		$data = Tecdoc::getCarModel($id);
		//$this->debug($data);
		return $this->render('carmodel',compact('data'));
	}
	public function actionGettree(){
		$request = Yii::$app->request;
		$typ_id = $request->get('typ_id');
		$data = Tecdoc::getTree($typ_id);
		$this->debug($data);
	}
}