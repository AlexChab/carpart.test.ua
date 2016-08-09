<?php
namespace app\models;

use Yii;
use yii\base\Model;

class Manufactures extends Model
{
	function manufacturesGet(){
		$data = Yii::$app->db1->createCommand("SELECT * FROM db_manufactures ORDER BY MFA_BRAND")->queryAll();
		return $data;
	}
	function manufacturesAdd($data){
		$data = Yii::$app->db1->createCommand()->insert('db_manufactures', [
			'MFA_ID' => $data['mfa_id'],
			'MFA_BRAND' => $data['mfa_brand'],
		])->execute();
		return $data;
	}
	function manufacturesDel($mfa_id){
		$data = Yii::$app->db1->createCommand()->delete('db_manufactures',['MFA_ID' => $mfa_id])->execute();
		return $data;
	}
}