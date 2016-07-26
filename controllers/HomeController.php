<?php
/**
 * Created by PhpStorm.
 * User: service
 * Date: 26.07.2016
 * Time: 15:38
 */

namespace app\controllers;


use yii\web\Controller;

class HomeController extends AppController
{
	public function actionIndex($name ='Гость'){
		$this->debug($_SERVER);
//		return $this->render('index', compact('name'));
	}
}