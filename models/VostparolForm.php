<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Vastparol;
use \yii\db\ActiveRecord;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class VostparolForm extends ActiveRecord
{
    public static function tableName(){
        return 'vastparol';
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['username'], 'required'],
            ['username', 'email'],
        ];
    }

    
    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    

    public function attributeLabels()
    {
        return [
            'username' => 'e-mail',
             
        ];
    }
}