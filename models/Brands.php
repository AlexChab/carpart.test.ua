<?php
/**
 * Created by PhpStorm.
 * User: service
 * Date: 17.08.2016
 * Time: 11:55
 */

namespace app\models;
use Yii;
use yii\base\Model;

class Brands extends Model
{
	static function brandsGet(){
		$data = Yii::$app->db1->createCommand("SELECT * FROM db_brands ORDER BY BRA_BRAND")->queryAll();
		return $data;
	}
	static function getBarandMargin(){
		$data = Yii::$app->db1->createCommand("SELECT * FROM db_brands LEFT JOIN db_brands_margin ON db_brands.BRA_ID = db_brands_margin.bra_id ORDER BY BRA_BRAND ASC")->queryAll();
		return $data;
	}
	static function brandsGetId($bra_id){
		$data = Yii::$app->db1->createCommand("SELECT * FROM db_brands WHERE BRA_ID = '$bra_id'")->queryOne();
		return $data;
	}
	static function brandsAdd($data){
		$data = Yii::$app->db1->createCommand()->insert('db_brands', [
			'BRA_ID' => $data['BRA_ID'],
			'BRA_MFC_CODE' => $data['BRA_MFC_CODE'],
			'BRA_BRAND' => $data['BRA_BRAND'],
			'BRA_MF_NR' => $data['BRA_MF_NR'],
		])->execute();
		return $data;
	}
	static function brandsDel($bra_id){
		$data = Yii::$app->db1->createCommand()->delete('db_brands',['BRA_ID' => $bra_id])->execute();
		return $data;
	}
}