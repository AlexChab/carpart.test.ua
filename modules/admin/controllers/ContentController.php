<?php
/**
 * Created by PhpStorm.
 * User: service
 * Date: 17.08.2016
 * Time: 9:54
 */

namespace app\modules\admin\controllers;
use app\models\Tecdoc;


class ContentController extends DefaultController
{

	public function actionContentsupl(){
		$data = Tecdoc::getListSuppliers();
		$this->debug($data);
	}
}