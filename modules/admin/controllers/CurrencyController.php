<?php
/**
 * Created by PhpStorm.
 * User: service
 * Date: 07.09.2016
 * Time: 16:43
 */

namespace app\modules\admin\controllers;

use Yii;
use app\models\Currency;
use yii\data\ArrayDataProvider;
use app\models\CurrencyForm;

class CurrencyController extends DefaultController
{
	public function actionIndex(){
		$dataProvider = new ArrayDataProvider([
			'allModels' => Currency::find()->all(),
			'pagination' => [
				'pageSize' => 10,
			],
			'sort' => [
				'attributes' => ['id','name','code','rate'],
			],
		]);
		return $this->render('index',['dataProvider'=>$dataProvider,]);
		
	}
	public function actionUpdate($id){
		$data = Currency::findOne($id);
		$form = new CurrencyForm();
		if($form->load(Yii::$app->request->post()) && $form->validate()) {

			$values = [
				'rate' => $form->rate,
			
			];
//			print_r(preg_replace('\-?\d+(\.\d{0,})?',$form->rate));
			$customer = Currency::findOne($id);
			$customer->attributes = $values;
			$customer->save();
			return $this->redirect(['index']);

		}
		return $this->render('update',['currencyForm'=>$form,'data'=>$data]);
	}
}