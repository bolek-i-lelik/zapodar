<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;
use \yii\db\ActiveRecord;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class VpForm extends ActiveRecord
{
    public $password2;
    
    public static function tableName(){
        return 'user';
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['password', 'password2'], 'required'],
            /*['password', 'validatePassword'],
            ['password2', 'validatePassword'],*/
        ];
    }

    
    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    

    public function attributeLabels()
    {
        return [
            'password' => 'Пароль',
            'password2' => 'Повторите пароль',
        ];
    }
}