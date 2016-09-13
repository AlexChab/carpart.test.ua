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
		return $this->render('carList',compact('data'));
	}
	public function actionYearlist(){
		$request = Yii::$app->request;
		$id = $request->get('manid');
		$data = array('1980','1981','1982','1983','1984','1985','1986','1987','1988','1989','1990','1991','1992','1993','1994','1995','1996','1997','1998','1999','2000','2001','2002','2003','2004','2005','2006','2007','2008','2009','2010','2011','2012','2013','2014','2015','2016');
		return $this->render('caryear',array('data'=>$data,'id'=>$id));
		
	}
	public function actionManfcar(){
		$request = Yii::$app->request;
		$id = $request->get('manid');
		$year = $request->get('caryear');
		$data = Tecdoc::getManufacturedCar($id,$year);
		return $this->render('manfCar',compact('data'));
		//$this->debug($data);
	}
	public function actionCarmodel(){
		$request = Yii::$app->request;
		$id = $request->get('carid');
		$data = Tecdoc::getCarModel($id);
		//$this->debug($data);
		return $this->render('carModel',compact('data'));
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
			$data['LA_ART_ID']= $value['LA_ART_ID'];
			$data['source'] = 'tecdoc';
			$result[] = $data;
		}
		return $this->render('carpart',array('data'=>$result));
	}
	public function actionSearchart(){
		$request = Yii::$app->request;
		$typ_id = $request->get('article');
		$data = Tecdoc::art_lookup($typ_id);
		echo '<div class="panel panel-default">
	<div class="panel-heading panel-heading-wrap">
		Результат поиска по артикулу
	</div>
	<div class="panel-body">
			<div class="table-responsive">
			<table class="table letter table-condensed">
				<thead>
				<tr>
					<th>Tree</th>
					<th>Производитель</th>
					<th>Номер изделия</th>
					<th>Тип номера</th>
					<th>Артикульный номер</th>
					<th>Название изделия</th>
					<th>Название изделия</th>

				</tr>
				</thead>
				<tbody>';
		foreach ($data as $value){
			$findPrice = Price::find()->where(['partcode'=>$value['NUMBER']])->one();
			$price = $findPrice['price'];
			echo'
						
						<tr>
						<td><a href="#"</a></td>
						<td>'.$value['BRAND'].'</td>
						<td>'.$value['NUMBER'].'</td>
						<td>'.$value['ARL_KIND'].'</td>
						<td>'.$value['ARL_ART_ID'].'</td>
						<td>'.$value['ART_COMPLETE_DES_TEXT'].'</td>
						<td>'.$price.'</td>
						</tr>';
			
		}
		echo '	</tbody>
			</table>
		</div>
	</div>
</div>';
		//return $this->render('parttree',array('data'=>$data));
		//$this->debug($data);
	}
}