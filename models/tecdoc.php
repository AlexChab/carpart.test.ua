<?php
/**
 * Created by PhpStorm.
 * User: service
 * Date: 28.07.2016
 * Time: 9:11
 */

namespace app\models;
use Yii;
use yii\base\Model;
use yii\db\Connection;


class Tecdoc extends Model
{
	public static function getListManufactured()
	{
//		$dsn = 'mysql:host=81.171.2.177;port=33306;dbname=tecdoc_rusiia';
//		$username = 'tecdoc';
//		$password = 'Kjgfnf35';
//		$connection = new Connection([
//			'dsn' => $dsn,
//			'username' => $username,
//			'password' => $password,
//		]);
		$connection = Yii::$app->getDb();
		$command = $connection->createCommand("SELECT MFA_ID, MFA_BRAND FROM MANUFACTURERS WHERE MFA_PC_MFC = '1' ORDER BY MFA_BRAND");
		$data = $command->queryAll();
		return $data;
	}
	public static function getManufacturedCar($id){
		echo $id.'test';
//
//		$connection = Yii::$app->getDb();
//		$command = $connection->createCommand("
//		SELECT
//		MOD_ID,
//		mod_pc,
//		MOD_CDS_ID,
//		TEX_TEXT AS MOD_CDS_TEXT,
//		MOD_PCON_START,
//		MOD_PCON_END
//		FROM MODELS
//		INNER JOIN COUNTRY_DESIGNATIONS ON CDS_ID = MOD_CDS_ID
//		INNER JOIN DES_TEXTS ON TEX_ID = CDS_TEX_ID
//		WHERE
//			MOD_MFA_ID = '648' AND
//			CDS_LNG_ID = '16' AND (MOD_PC = '1' AND MOD_CV = '0')
//			AND (MOD_PCON_END >= '200801' OR MOD_PCON_END <=> NULL) AND MOD_PCON_START <= '200801'
//		ORDER BY MOD_CDS_TEXT");
//		$data = $command->queryAll();
//		return $data;



	}
}