<?php

namespace app\models;

use Yii;
use \yii\db\Model;

class DbBrandsMargin extends \yii\base\Model
{
   static function insertData($data){
       $data = Yii::$app->db1->createCommand()->insert('db_brands_margin', [
         'bra_id' => $data['bra_id'],
         'margin' => $data['bra_margin'],
        ])->execute();
       return $data;
   }
  static function updateData($data){
    $margin = $data['bra_margin'];
    $bra_id = $data['bra_id'];
    $data = Yii::$app->db1->createCommand("UPDATE db_brands_margin SET margin = '$margin' WHERE bra_id='$bra_id'")->execute();
    return $data;
  }
}
