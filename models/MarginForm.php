<?php
/**
 * Created by PhpStorm.
 * User: service
 * Date: 17.08.2016
 * Time: 17:05
 */

namespace app\models;


use yii\base\Model;

class MarginForm extends Model
{
	public $bra_id;
	public $bra_name;
	public $bra_margin;

	public function rules()
	{
		return [
			['bra_margin', 'required','message' => 'Обязательно для воода'],
			['bra_margin','integer','min'=>1,'max'=>300,'message' => 'Только целое число']
		];
	}
	public function attributeLabels()
	{
		return [
			'bra_margin'=>'Торговая наценка в % , целое число'
		];
	}
	
}