<?php
/**
 * Created by PhpStorm.
 * User: service
 * Date: 17.08.2016
 * Time: 9:54
 */

namespace app\modules\admin\controllers;

use Yii;
use app\models\Tecdoc;
use app\models\Manufactures;
use app\models\Brands;
use yii\data\ArrayDataProvider;


class ContentController extends DefaultController
{
	// Section Brands
	public function actionContentsupl(){
		$data = Tecdoc::getListBrands();
		$dataProvider = new ArrayDataProvider([
			'allModels' => $data,
			'pagination' => [
				'pageSize' => 100,
			],
			'sort' => [
				'attributes' => ['BRA_ID', 'BRA_BRAND','BRA_MFC_CODE','BRA_MF_NR',],
			],
		]);
		return $this->render('contentBra',['dataProvider'=>$dataProvider]);
	}
	public function actionAddbrands()
	{
		$request = Yii::$app->request;
		$data = Tecdoc::getBrandsId($request->get('bra_id'));
		$result = Brands::brandsAdd($data);
		return $result;
	}

	public function actionDelbrands()
	{
		$request = Yii::$app->request;
		$bra_id = $request->get('bra_id');
		$result = Brands::brandsDel($bra_id);
		return ($result);
	}
	// End Section Brands

	// Section manufactures
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
	// End Section manufactures
}