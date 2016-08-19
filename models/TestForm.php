<?php
/**
 * Created by PhpStorm.
 * User: service
 * Date: 19.08.2016
 * Time: 12:37
 */

namespace app\models;
use yii\base\Model;


class TestForm extends Model 
{
	public $test;

	public function rules()
	{
		return [
			// атрибут required указывает, что name, email, subject, body обязательны для заполнения
			[['test'], 'required'],
	
		];
	}
	
}