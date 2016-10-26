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
 * @property string $e_mail
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
 * @property string $secret_key
 * @property string $date_valid_secret_key
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
            [['password', 'username'], 'required'],
            [['created_at'], 'safe'],
            [['familie', 'name', 'father', 'foto', 'born', 'e_mail'], 'string', 'max' => 100],
            [['tel'], 'string', 'max' => 11],
            [['adress', 'info', 'auth_key', 'username', 'secret_key', 'date_valid_secret_key'], 'string', 'max' => 255],
            [['password', 'access_token'], 'string', 'max' => 32],
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
            'familie' => 'Фамилия',
            'name' => 'Имя',
            'father' => 'Отчество',
            'foto' => 'Фотография',
            'born' => 'Дата рождения',
            'sex' => 'Пол',
            'e_mail' => 'E Mail',
            'tel' => 'Телефон',
            'adress' => 'Адресс',
            'info' => 'Доп. информация',
            'password' => 'Пароль',
            'reg_email' => 'Reg Email',
            'podpiska' => 'Подписка',
            'auth_key' => 'Auth Key',
            'created_at' => 'Дата регистрации',
            'username' => 'Логин',
            'access_token' => 'Access Token',
            'secret_key' => 'Secret Key',
            'date_valid_secret_key' => 'Date Valid Secret Key',
        ];
    }
}
