<?php
/**
 * Created by PhpStorm.
 * User: service
 * Date: 26.07.2016
 * Time: 15:38
 */

namespace app\controllers;


use app\models\Manufactures;
use yii\web\Controller;

class HomeController extends AppController
{
	public $layout = 'home';
	public function actionIndex(){
		// $this->debug($_SERVER);
	return $this->render('carList');
	}
	public function actionCarlist(){
		$data = Manufactures::getListCar();
		return $this->render('carList',compact('data'));
		
	}
}