<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "statistic".
 *
 * @property integer $id
 * @property string $name
 * @property string $text
 * @property integer $pokaz
 */
class Statistic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'statistic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['pokaz'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'name' => 'Название',
            'text' => 'Код счётчика',
            'pokaz' => 'Вкл/Выкл',
        ];
    }
}
