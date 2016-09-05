<?php
/**
 * Created by PhpStorm.
 * User: service
 * Date: 02.09.2016
 * Time: 15:23
 */

namespace app\models;


use yii\base\Model;

class UploadForm extends Model
{
	public $dataFile;
	public $suppliers;

	public function rules()
	{
		return [
		[['dataFile'], 'file', 'extensions' => 'csv' ],
		[['suppliers',],'required'],
		];
	}
	public function attributeLabels()
	{
		return [
			'dataFile'=>'Выбор файла *.csv',
			'suppliers' =>'Выбор поставщика',
		];
	}
}