<?php
/**
 * Created by PhpStorm.
 * User: service
 * Date: 26.07.2016
 * Time: 17:09
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;

class AppController extends Controller
{
	public function debug($data){
		echo '<pre>'.print_r($data,true).'</pre>';
	}
	public function actionLogout()
	{
		Yii::$app->user->logout();
		return $this->goHome();
	}

}
