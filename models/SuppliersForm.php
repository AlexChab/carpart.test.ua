<?php
/**
 * Created by PhpStorm.
 * User: service
 * Date: 22.08.2016
 * Time: 14:53
 */

namespace app\models;


use yii\base\Model;

class SuppliersForm extends Model
{
	public $name;
	public $shortName;

	public function rules(){
		return[
			['name','required','message'=>'Обязательно для ввода'],
			['shortName','required','message'=>'Обязательно для ввода'],
		];
	}
	public function attributeLabels()
	{
		return [
			'name'=>'Полное название поставщика',
			'shortName'=>'Короткое название поставщика',
		];
	}
}