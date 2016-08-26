<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "price".
 *
 * @property integer $id
 * @property integer $suppliers_id
 * @property string $partcode
 * @property string $partname
 * @property string $partbrand
 * @property integer $qty
 * @property string $price
 * @property string $typcur
 * @property string $created
 * @property string $modified
 */
class Price extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'price';
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
            [['suppliers_id', 'partcode', 'partname', 'partbrand', 'qty', 'price', 'typcur'], 'required'],
            [['suppliers_id', 'qty'], 'integer'],
            [['created', 'modified'], 'safe'],
            [['partcode'], 'string', 'max' => 50],
            [['partname', 'partbrand'], 'string', 'max' => 256],
            [['price'], 'string', 'max' => 10],
            [['typcur'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'suppliers_id' => 'Suppliers ID',
            'partcode' => 'Partcode',
            'partname' => 'Partname',
            'partbrand' => 'Partbrand',
            'qty' => 'Qty',
            'price' => 'Price',
            'typcur' => 'Typcur',
            'created' => 'Created',
            'modified' => 'Modified',
        ];
    }
}
