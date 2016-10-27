<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "question".
 *
 * @property integer $id
 * @property string $familie
 * @property string $name
 * @property string $father
 * @property string $email
 * @property string $adress
 * @property string $company
 * @property string $dolgnost
 * @property string $text
 * @property string $date
 * @property integer $sost
 */
class Question extends \yii\db\ActiveRecord
{
    public $verifyCode;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['familie', 'name', 'father', 'email', 'text'], 'required'],
            [['text'], 'string'],
            [['date'], 'safe'],
            [['sost'], 'integer'],
            [['familie', 'name', 'father', 'email', 'adress', 'company', 'dolgnost'], 'string', 'max' => 255],
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'familie' => 'Фамилия',
            'name' => 'Имя',
            'father' => 'Отчество',
            'email' => 'Email',
            'adress' => 'Адрес',
            'company' => 'Название организации',
            'dolgnost' => 'Должность/Специальность',
            'text' => 'Ваш вопрос',
            'date' => 'Дата',
            'sost' => 'Состояние',
        ];
    }
}
