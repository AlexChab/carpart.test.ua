<?php


namespace app\models\form;


use yii\base\Model;

class ImportfilepriceForm extends Model
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