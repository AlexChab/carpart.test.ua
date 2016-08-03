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
use yii\web\Controller;


class HomeController extends AppController
{
	public $layout = 'home';
	public function actionIndex(){
		$data = Tecdoc::getListManufactured();
		return $this->render('carList',compact('data'));
	}
	public function actionYearlist(){
		$request = Yii::$app->request;
		$id = $request->get('manid');
		$data = array('1980','1981','1982','1983','1984','1985','1986','1987','1988','1989','1990','1991','1992','1993','1994','1995','1996','1997','1998','1999','2000','2001','2002','2003','2004','2005','2006','2007','2008','2009','2010','2011','2012','2013','2014','2015','2016');
		return $this->render('caryear',array('data'=>$data,'id'=>$id));
		
	}
	public function actionManfcar(){
		//$year = '200801';
		$request = Yii::$app->request;
		$id = $request->get('manid');
		$year = $request->get('caryear');
		$data = Tecdoc::getManufacturedCar($id,$year);
		return $this->render('manfcar',compact('data'));
		//$this->debug($data);
	}
	public function actionCarmodel(){
		$request = Yii::$app->request;
		$id = $request->get('carid');
		$data = Tecdoc::getCarModel($id);
		//$this->debug($data);
		return $this->render('carmodel',compact('data'));
	}
	public function actionGettree(){
		$request = Yii::$app->request;
		$typ_id = $request->get('typ_id');
		$str_id = $request->get('str_id');
		
		$data = Tecdoc::getTree($typ_id,$str_id);
		return $this->render('parttree',array('data'=>$data,'typ_id'=>$typ_id,'str_id'=>$str_id));
		//$this->debug($data);
	}
	public function actionGetmarket(){
		$request = Yii::$app->request;
		$typ_id = $request->get('typ_id');
		$str_id = $request->get('str_id');
		$dataTree = Tecdoc::getTree2($typ_id,$str_id);
		foreach ($dataTree as $value){
			$data = Tecdoc::articles($value['LA_ART_ID']);
			$result[] = $data;
		}
		return $this->render('carpart',array('data'=>$result));
		//$this->debug($result);
	}
}