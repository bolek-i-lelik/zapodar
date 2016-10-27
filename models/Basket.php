<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "basket".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $product_id
 * @property integer $count
 * @property integer $buy
 * @property string $date
 * @property string $sost
 * @property integer $zakaz_id
 */
class Basket extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'basket';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'product_id', 'count', 'buy', 'zakaz_id'], 'integer'],
            [['date'], 'safe'],
            [['sost'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'product_id' => 'Product ID',
            'count' => 'Count',
            'buy' => 'Buy',
            'date' => 'Date',
            'sost' => 'Sost',
            'zakaz_id' => 'Zakaz ID',
        ];
    }
}
