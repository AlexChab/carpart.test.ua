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
		// $this->debug($_SERVER);
	return $this->render('index');
	}
	public function actionCarlist(){
		$data = Tecdoc::getListManufactured();
		return $this->render('carList',compact('data'));
	}
	public function actionManfcar(){
		$request = Yii::$app->request;
		$id = $request->get('manid');
		// echo $id;
		$data = Tecdoc::getManufacturedCar($id);
//		return $this->render('manfcar',compact('data'));
		//$this->debug($data);
	}
}