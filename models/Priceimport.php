<?php
/**
 * Created by PhpStorm.
 * User: service
 * Date: 02.09.2016
 * Time: 13:07
 */

namespace app\models;


use yii\base\Model;
use Yii;

class Priceimport extends Model
{
	static function insert($data){

//		$data = Yii::$app->db1->createCommand()->batchInsert('price', ['partcode','partname','partbrand','qty','price','typcur'], [
//				$data	])->execute();
		$data = Yii::$app->db1->createCommand("INSERT INTO price (suppliers_id,partcode,partbrand,qty,price,typcur) VALUES ".substr($data, 0, -1))->execute();
		return $data;
	}
	
}