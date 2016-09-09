<?php
/**
 * Created by PhpStorm.
 * User: service
 * Date: 09.09.2016
 * Time: 12:18
 */

namespace app\models;


use yii\base\Model;

class CurrencyForm extends Model
{
	public $rate;
	public function rules()
	{
		return [
			['rate', 'required','message' => 'Обязательно для воода'],

		];
	}
	public function attributeLabels()
	{
		return [
			'rate'=>'Новый курс'
		];
	}


}