<?php
/**
 * Created by PhpStorm.
 * User: service
 * Date: 17.08.2016
 * Time: 13:51
 */

namespace app\modules\admin\controllers;
use app\models\DbBrandsMargin;
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
	
	public function actionCreatemargin(){
		$request = Yii::$app->request;
		$braId = $request->get('bra_id');
		$model = new MarginForm();
		if($model->load(Yii::$app->request->post()) && $model->validate()){
			$data['bra_margin'] = $model->bra_margin;
			$data['bra_id'] = $request->get('bra_id');
			//$this->debug($data);
			$result = DbBrandsMargin::insertData($data);
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
		return $this->render('content',['marginForm'=>$model,'bra_id'=>$braId]);
	}
	public function actionUpdatemargin(){
		$request = Yii::$app->request;
		$braId = $request->get('bra_id');
		$model = new MarginForm();
		if($model->load(Yii::$app->request->post()) && $model->validate()){
			$data['bra_margin'] = $model->bra_margin;
			$data['bra_id'] = $request->get('bra_id');
			//$this->debug($data);
			$result = DbBrandsMargin::updateData($data);
//			$data = Brands::getBarandMargin();
//			$dataProvider = new ArrayDataProvider([
//				'allModels' => $data,
//				'pagination' => [
//					'pageSize' => 100,
//				],
//				'sort' => [
//					'attributes' => ['BRA_ID', 'BRA_BRAND','BRA_MFC_CODE','BRA_MF_NR',],
//				],
//			]);
			//return $this->render('index',['dataProvider'=>$dataProvider]);
			return $this->redirect('index');
			
		}
		return $this->render('content',['marginForm'=>$model,'bra_id'=>$braId]);
	}

}