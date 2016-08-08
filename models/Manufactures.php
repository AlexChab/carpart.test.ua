<?php
/**
 * Created by PhpStorm.
 * User: service
 * Date: 08.08.2016
 * Time: 11:46
 */

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\Connection;

class Manufactures extends Model
{
	function manufacturesGet(){
//		$dsn = 'mysql:host=81.171.2.177;port=33306;dbname=db_site';
//		$username = 'tecdoc';
//		$password = 'Kjgfnf35';
//		$connection = new Connection([
//			'dsn' => $dsn,
//			'username' => $username,
//			'password' => $password,
//		]);

		$connection = Yii::$app->db1();
		$command = $connection->createCommand("SELECT * FROM db_manufactures ORDER BY MFA_BRAND");
		$data = $command->queryAll();
		return $data;
	}
	function manufacturesAdd($data){
		$dsn = 'mysql:host=81.171.2.177;port=33306;dbname=db_site';
		$username = 'tecdoc';
		$password = 'Kjgfnf35';
		$connection = new Connection([
			'dsn' => $dsn,
			'username' => $username,
			'password' => $password,
		]);
		$command = $connection->createCommand()->insert('db_manufactures', [
			'MFA_ID' => $data['mfa_id'],
			'MFA_BRAND' => $data['mfa_brand'],
		]);
		//$command = $connection->createCommand("SELECT * FROM db_manufactures ORDER BY MFA_BRAND");
		$data = $command->execute();
		return $data;
	}
	function manufacturesDel($mfa_id){
		$dsn = 'mysql:host=81.171.2.177;port=33306;dbname=db_site';
		$username = 'tecdoc';
		$password = 'Kjgfnf35';
		$connection = new Connection([
			'dsn' => $dsn,
			'username' => $username,
			'password' => $password,
		]);
		$command = $connection->createCommand()->delete('db_manufactures',['MFA_ID' => $mfa_id]);
		$data = $command->execute();
		return $data;
	}
}