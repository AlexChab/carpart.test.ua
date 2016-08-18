<?php
/**
 * Created by PhpStorm.
 * User: service
 * Date: 17.08.2016
 * Time: 13:51
 */

namespace app\modules\admin\controllers;
use Yii;
use app\models\Brands;
use yii\data\ArrayDataProvider;

use app\models\MarginForm;

class MarginController extends DefaultController
{
	public function actionIndex(){
		$data = Brands::getBarandMargin();
		$dataProvider = new ArrayDataProvider([
			'allModels' => $data,
			'pagination' => [
				'pageSize' => 100,
			],
			'sort' => [
				'attributes' => ['BRA_ID', 'BRA_BRAND','BRA_MFC_CODE','BRA_MF_NR',],
			],
		]);
		return $this->render('index',['dataProvider'=>$dataProvider]);
		
	}
	public function actionChangemargin(){
		$request = Yii::$app->request;
		$braId = $request->get('bra_id');
		$marginForm = new MarginForm();
		return $this->render('content',['marginForm'=>$marginForm,'bra_id'=>$braId]);
		
	}
	
	
}