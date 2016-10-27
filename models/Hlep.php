<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "help".
 *
 * @property integer $id
 * @property string $vopros
 * @property string $otvet
 * @property integer $pokaz
 */
class Hlep extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'help';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vopros', 'otvet'], 'string'],
            [['pokaz'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'vopros' => 'Вопрос',
            'otvet' => 'Ответ',
            'pokaz' => 'Публикация',
        ];
    }
}
