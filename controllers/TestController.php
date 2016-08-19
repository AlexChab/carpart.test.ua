<?php
/**
 * Created by PhpStorm.
 * User: service
 * Date: 19.08.2016
 * Time: 12:39
 */

namespace app\controllers;
use Yii;

use app\models\TestForm;


class TestController extends AppController

{
	
	public function actionTest(){
		$model = new TestForm();
		if($model->load(Yii::$app->request->post())){
			echo 'workit';
			$this->debug(Yii::$app->request->post());
		}
		return $this->render('test',['testform'=>$model]);
	}
	
}