<?php
/**
 * Created by PhpStorm.
 * User: service
 * Date: 02.09.2016
 * Time: 15:23
 */

namespace app\models;


use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{

	public $dataFile;

	public function rules()
	{
		return [
			[['dataFile'], 'file', 'skipOnEmpty' => false, 'maxSize' => 1024*1024*8],
		];
	}

	public function upload()
	{
		if ($this->validate()) {
			$this->dataFile->saveAs('upload/' . $this->dataFile->baseName . '.' . $this->dataFile->extension);
			return true;
		} else {
			return false;
		}
	}
}