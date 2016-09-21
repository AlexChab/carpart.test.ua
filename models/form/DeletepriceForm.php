<?php
/**
 * Created by PhpStorm.
 * User: service
 * Date: 20.09.2016
 * Time: 12:16
 */

namespace app\models\form;


use yii\base\Model;

class DeletepriceForm extends Model
{
	public $suppliers;
	public function rules(){
		return [
			
			[['suppliers',],'required'],
		];
	}
	public function attributeLabels()
	{
		return [
			'suppliers' =>'Выбор поставщика',
		];
	}

}