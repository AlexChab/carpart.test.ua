<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_brands".
 *
 * @property integer $BRA_MF_NR
 * @property integer $BRA_ID
 * @property string $BRA_MFC_CODE
 * @property string $BRA_BRAND
 */
class DbBrands extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_brands';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db1');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['BRA_MF_NR', 'BRA_ID', 'BRA_MFC_CODE', 'BRA_BRAND'], 'required'],
            [['BRA_MF_NR', 'BRA_ID'], 'integer'],
            [['BRA_MFC_CODE', 'BRA_BRAND'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'BRA_MF_NR' => 'Bra  Mf  Nr',
            'BRA_ID' => 'Bra  ID',
            'BRA_MFC_CODE' => 'Bra  Mfc  Code',
            'BRA_BRAND' => 'Bra  Brand',
        ];
    }
}
