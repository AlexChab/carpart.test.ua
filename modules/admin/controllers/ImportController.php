<?php
/**
 * Created by PhpStorm.
 * User: service
 * Date: 22.08.2016
 * Time: 11:42
 */

namespace app\modules\admin\controllers;

use app\models\Price;
use Yii;
use app\models\Priceimport;
use app\models\UploadForm;
use app\models\form\DeletepriceForm;
use yii\web\UploadedFile;

class ImportController extends DefaultController
{
	public function actionIndex(){
		$model = new UploadForm();
		$delsuppliers = new DeletepriceForm();
		if($model->load(Yii::$app->request->post()) && $model->validate()){
			$file = $model->dataFile = UploadedFile::getInstance($model, 'dataFile');
			$file->saveAs('upload/pricelist.csv');
			$suppliers = $model->suppliers;
			$this->actionPriceimport($suppliers);
			$suppliers ='Прайс загружен';
		}
		else{
			$suppliers ='Загрузка прайсов';
		}
		return $this->render('index', ['model' => $model,'delsuppliers'=>$delsuppliers,'data' => $suppliers]);
	}

	public function actionPriceimport($suppliers){
		if($suppliers){}
		else{
			$suppliers = $_GET['suppliers'] ;
		}
		if (($handle_f = fopen('upload\pricelist.csv', "r")) !== FALSE){
			// проверяется, надо ли продолжать импорт с определенного места
			// если да, то указатель перемещается на это место
			$dataImport = '';
			if(isset($_GET['ftell'])){
				fseek($handle_f,$_GET['ftell']);
			}
			$i=0;
			if(isset($_GET['x'])){
				$x=$_GET['x'];
		//	echo 'Текущий пакет '.$x.' записей <br>';
			} else {
				$x = 0;
		}
			// построчное считывание и анализ строк из файла
		while ( ($data_f = fgetcsv($handle_f, 1000, ";"))!== FALSE) {
				$implodeData = "('".$suppliers."','". preg_replace ('![^\w\d]*!','',$data_f[0]) ."','".strtoupper($data_f[2])."','".$data_f[3]."','".$data_f[4]."','".$data_f[5]."')";
				$dataImport = $dataImport.$implodeData.',';
//			$model->partbrand= trim(preg_replace('/(^"|"$)/', '', $data_f[2]));
				//if(!strstr($i/100,'.')){
				if(($i%100) == 0){
					Priceimport::insert($dataImport);
					$dataImport ='';
				  echo 'Импортировано записей : '.$x.'<br />';
					flush();
					ob_flush();
				}
				if($i==1000){
					//print '<meta http-equiv="Refresh" content="0; url='.$_SERVER['PHP_SELF'].'?x='.$x.'&amp;ftell='.ftell($handle_f).'&amp;path='.$_GET['path'].'">';
					print '<meta http-equiv="Refresh" content="0; url='.$_SERVER['PHP_SELF'].'admin/import/priceimport?x='.$x.'&amp;ftell='.ftell($handle_f).'&amp;suppliers='.$suppliers.'">';
					exit;
				}
				$x++;
				$i++;
			}
			Priceimport::insert($dataImport);
			fclose($handle_f);
			unlink('upload\pricelist.csv');
			return $this->redirect('index');
		}
		return $this->redirect('index');
	}
	public function actionDeleteprice(){
		$suppliers = '16';
		Price::deleteAll(['suppliers_id' => $suppliers]);
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