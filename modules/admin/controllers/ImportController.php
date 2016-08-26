<?php
/**
 * Created by PhpStorm.
 * User: service
 * Date: 22.08.2016
 * Time: 11:42
 */

namespace app\modules\admin\controllers;

use app\models\Price;

class ImportController extends DefaultController
{
	public function actionPrice(){

	}
	public function actionImportfile(){
		$suppliers = "16";

		$row = 1;
		if (($handle = fopen('upload\pricelist.csv', "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000)) !== FALSE) {

				$num = count($data);
				$row++;
				for ($c=0; $c < $num; $c++) {
					$pieces = explode(";",$data[$c]);
					$model = new Price();
					$model->suppliers_id = $suppliers;
					$model->partcode= $pieces[0];
					$model->partname = trim(preg_replace('/(^"|"$)/', '', $pieces[1]));
					$model->partbrand= trim(preg_replace('/(^"|"$)/', '', $pieces[2]));
					//$model->qty= $pieces[3];
					$model->qty= trim(preg_replace('/(^"|"$)/', '', $pieces[3]));;
					$model->price= trim(preg_replace('/(^"|"$)/', '', $pieces[4]));
//					$model->price=  $pieces[4];
					$model->typcur= $pieces[5];
					$model->save();
//					$this->render('index',['data'=>$row]);
					print_r($pieces);
				}
			}
			fclose($handle);
		}
		
	}
	
}