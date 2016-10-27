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
class Questionadmin extends \yii\db\ActiveRecord
{
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
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'familie' => 'Familie',
            'name' => 'Name',
            'father' => 'Father',
            'email' => 'Email',
            'adress' => 'Adress',
            'company' => 'Company',
            'dolgnost' => 'Dolgnost',
            'text' => 'Text',
            'date' => 'Date',
            'sost' => 'Sost',
        ];
    }
}
