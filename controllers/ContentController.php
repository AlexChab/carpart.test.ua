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
use app\models\Manufactures;
use yii\data\ArrayDataProvider;
use app\models\LoginForm;
use yii\web\User;
class ContentController extends AppController
{
	public $layout = 'content';

	public function actionIndex()
	{
	

	}


	public function actionContentmfa()
	{

		$data = Tecdoc::getListManufactured();
		$dataProvider = new ArrayDataProvider([
			'allModels' => $data,
			'pagination' => [
				'pageSize' => 20,
			],
			'sort' => [
				'attributes' => ['MFA_ID', 'MFA_BRAND'],
			],
		]);
		return $this->render('contentMfa',['dataProvider'=>$dataProvider]);

	}

	public function actionAddmanufactures()
	{
		$request = Yii::$app->request;
		$data['mfa_id'] = $request->get('mfa_id');
		$data['mfa_brand'] = $request->get('mfa_brand');
		$result = Manufactures::manufacturesAdd($data);

	}

	public function actionDelmanufactures()
	{
		$request = Yii::$app->request;
		$mfa_id = $request->get('mfa_id');
		$result = Manufactures::manufacturesDel($mfa_id);
		return ($result);
	}
	public function actionTest()
	{
		return $this->render('test');
	}
	public function actionTest1(){
		$identity = array('login'=>'admin','password'=>'admin');
//		yii::$app->user->login($identity,3600);
		//property
		print_r(yii::$app->user->getId());
	}
}