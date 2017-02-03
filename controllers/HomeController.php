<?php
/**
 * Created by PhpStorm.
 * User: service
 * Date: 26.07.2016
 * Time: 15:38
 */

namespace app\controllers;

use Yii;
use app\models\Tecdoc;
use app\models\Manufactures;
use yii\web\Controller;
use app\models\Price;


class HomeController extends AppController
{
	public $layout = 'home';
	public function actionIndex(){
		//$data = Tecdoc::getListManufactured();
		$data = Manufactures::manufacturesGet();
		return $this->render('carlist',compact('data'));
	}
	public function actionYearlist(){
		$request = Yii::$app->request;
		$id = $request->get('manid');
		$mfaBrand = $request->get('mfaBrand');
		$data = array('1980','1981','1982','1983','1984','1985','1986','1987','1988','1989','1990','1991','1992','1993','1994','1995','1996','1997','1998','1999','2000','2001','2002','2003','2004','2005','2006','2007','2008','2009','2010','2011','2012','2013','2014','2015','2016');
		return $this->render('caryear',array('data'=>$data,'id'=>$id,'mfaBrand'=>$mfaBrand));
		
	}
	public function actionManfcar(){
		$request = Yii::$app->request;
		$id = $request->get('manid');
		$carYear = $request->get('caryear');
		$year = $request->get('year');
		$mfaBrand = $request->get('mfaBrand');
		$data = Tecdoc::getManufacturedCar($id,$carYear);
		//return $this->render('manfcar',compact('data'));
		return $this->render('manfcar',array('data'=>$data,'id'=>$id,'mfaBrand'=>$mfaBrand,'year'=>$year));
		//$this->debug($data);
	}
	public function actionCarmodel(){
		$request = Yii::$app->request;
		$id = $request->get('carid');
		$modelCar= $request->get('model');
		$year = $request->get('year');
		$mfaBrand = $request->get('mfaBrand');
		$data = Tecdoc::getCarModel($id);
		//$this->debug($data);
		//return $this->render('carmodel',compact('data'));
		return $this->render('carmodel',array('data'=>$data,'model'=>$modelCar,'mfaBrand'=>$mfaBrand,'year'=>$year));
	}
	public function actionGettree(){
		$request = Yii::$app->request;
		$typ_id = $request->get('typ_id');
		$str_id = $request->get('str_id');
		$year = $request->get('year');
		$typ_cds = $request->get('typ_cds');
		$mfaBrand = $request->get('mfaBrand');
		$modelCar= $request->get('model');
		$data = Tecdoc::getTree($typ_id,$str_id);
		return $this->render('parttree',array('data'=>$data,'typ_id'=>$typ_id,'str_id'=>$str_id,'mfaBrand'=>$mfaBrand,'modelCar'=>$modelCar,'year'=>$year,'typ_cds'=>$typ_cds));
		//$this->debug($data);
	}
	public function actionGetmarket(){
		$request = Yii::$app->request;
		$typ_id = $request->get('typ_id');
		$str_id = $request->get('str_id');
		$year = $request->get('year');
		$typ_cds = $request->get('typ_cds');
		$mfaBrand = $request->get('mfaBrand');
		$modelCar= $request->get('modelCar');

		$dataTree = Tecdoc::getTree2($typ_id,$str_id);
		foreach ($dataTree as $value){
			$data = Tecdoc::articles($value['LA_ART_ID']);
			$data['LA_ART_ID']= $value['LA_ART_ID'];
			$data['source'] = 'tecdoc';
			$result[] = $data;
		}
		return $this->render('carpart',array('data'=>$result, 'mfaBrand'=>$mfaBrand,'modelCar'=>$modelCar,'year'=>$year,'typ_cds'=>$typ_cds));
	}
	public function actionSearchart(){
		$request = Yii::$app->request;
		$typ_id = $request->get('article');
		$data = Tecdoc::art_lookup($typ_id);
		return $this->renderPartial('searchart',array('data'=>$data,'source'=>'tecdoc'));
	}
}