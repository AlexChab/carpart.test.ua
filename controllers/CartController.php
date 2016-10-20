<?php

namespace app\controllers;

use Yii;


class CartController extends AppController
{
	public function actionAddorder()
	{
		$request = Yii::$app->request;
		$idProduct = $request->get('id');
		$this->debug($idProduct);
	}
	public function actionDelorder()
	{
		$request = Yii::$app->request;
		$idProduct = $request->get('id');
		$this->debug($idProduct);
	}
	public function actionCreateorder(){

		$request = Yii::$app->request;
		$this->debug($request->post('jsonData'));
				

	}
}