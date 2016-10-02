<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $familie
 * @property string $name
 * @property string $father
 * @property string $foto
 * @property string $born
 * @property integer $sex
 * @property string $e-mail
 * @property string $tel
 * @property string $adress
 * @property string $info
 * @property string $password
 * @property integer $reg_email
 * @property integer $podpiska
 * @property string $auth_key
 * @property string $created_at
 * @property string $username
 * @property string $access_token
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'sex', 'reg_email', 'podpiska'], 'integer'],
            [['familie', 'name', 'father', 'foto', 'born', 'sex', 'e-mail', 'tel', 'adress', 'info', 'password', 'username'], 'required'],
            [['created_at'], 'safe'],
            [['familie', 'name', 'father', 'foto', 'born', 'e-mail'], 'string', 'max' => 100],
            [['tel'], 'string', 'max' => 11],
            [['adress', 'info', 'username'], 'string', 'max' => 255],
            [['password', 'auth_key', 'access_token'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'familie' => 'Familie',
            'name' => 'Name',
            'father' => 'Father',
            'foto' => 'Foto',
            'born' => 'Born',
            'sex' => 'Sex',
            'e-mail' => 'E Mail',
            'tel' => 'Tel',
            'adress' => 'Adress',
            'info' => 'Info',
            'password' => 'Password',
            'reg_email' => 'Reg Email',
            'podpiska' => 'Podpiska',
            'auth_key' => 'Auth Key',
            'created_at' => 'Created At',
            'username' => 'Username',
            'access_token' => 'Access Token',
        ];
    }
}
