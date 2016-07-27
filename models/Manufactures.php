<?php
namespace app\models;
use yii\base\Model;
use yii\db\Connection;

class Manufactures extends Model
{
	public function getListCar(){
//		$dsn = 'mysql:host=81.171.2.177;port=33306;dbname=tecdoc_rusiia';
//		$username = 'tecdoc';
//		$password = 'Kjgfnf35';
//		$connection = new Connection([
//			'dsn' => $dsn,
//			'username' => $username,
//			'password' => $password,
//		]);
		$connection = \Yii::$app->getDb();
		$command = $connection->createCommand("SELECT MFA_ID, MFA_BRAND FROM MANUFACTURERS WHERE MFA_PC_MFC = '1' ORDER BY MFA_BRAND");
		$data = $command->queryAll();
		return $data;
	}
}