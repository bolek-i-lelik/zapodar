<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vastparol".
 *
 * @property integer $id
 * @property string $secret_key
 * @property string $date_valid_secret_key
 * @property string $username
 */
class Vastparol extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vastparol';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            /*[['secret_key', 'date_valid_secret_key', 'username'], 'string', 'max' => 255],*/
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'secret_key' => 'Secret Key',
            'date_valid_secret_key' => 'Date Valid Secret Key',
            'username' => 'Username',
        ];
    }
}
