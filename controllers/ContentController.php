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

class ContentController extends AppController
{
	public $layout = 'content';
	public function actionIndex(){
		$data = Tecdoc::getListManufactured();
		// $this->debug($data);
	return $this->render('index',array('data'=>$data));

	}
	public function actionMantable(){
		$data = Tecdoc::getListManufactured();
		return $this->render('index',array('data'=>$data));
	}
	public function actionMantabledel(){

	}
	public function actionMantableadd(){

	}
	
	
}