<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zakaz".
 *
 * @property integer $id
 * @property integer $sost
 * @property string $date
 * @property integer $user_id
 * @property string $info
 */
class Zakaz extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zakaz';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sost', 'user_id'], 'integer'],
            [['date'], 'safe'],
            [['info'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор заказ',
            'sost' => 'Состояние',
            'date' => 'Дата',
            'user_id' => 'Идентификатор пользователя',
            'info' => 'Пометки',
        ];
    }
}
