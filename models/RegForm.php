<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class RegForm extends Model
{
    public $familie;
    public $name;
    public $father;
    public $e_mail;
    public $tel;
    public $adress;
    public $username;
    public $password;
    public $password2;
    public $podpiska = true;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password', 'familie', 'name', 'father', 'e_mail', 'tel', 'adress', 'password2'], 'required'],
            // rememberMe must be a boolean value
            ['podpiska', 'boolean'],
            // password is validated by validatePassword()
            ['username', 'validateUsername'],
            ['e_mail', 'email'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validateUsername($attribute, $params)
    {
        $user = User::find()->where(['username' => $this->username])->one();

        if ($user->id) {
                $this->addError($attribute, 'Пользователь с таким логином уже существует.');
            }
        }
    
    public function validatePassword($attribute, $params)
    {
        if ($password != $password2) {
                $this->addError($attribute, 'Пароли не равны. Проверьте правильность ввода паролей.');
            }
        
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function reg()
    {
        if ($this->validate()) 
        {

            $user = new User();
            $user->familie = $familie;
            $user->name = $name;
            $user->father = $father;
            $user->e_mail = $e_mail;
            $user->tel = $tel;
            $user->adress = $adress;
            $user->username = $username;
            $$user->password = md5($password);
            $user->podpiska = $podpiska;

        }
        return false;
    }

    public function attributeLabels()
    {
        return [
            'familie' => 'Фамилия',
            'name' => 'Имя',
            'father' => 'Отчество',
            'e_mail' => 'e-mail',
            'tel' => 'Телефон',
            'adress' => 'Адрес',
            'username' => 'Логин',
            'password' => 'Пароль',
            'podpiska' => 'Согласен получать материалы информационного характера на свою электронную почту',
            'password2' => 'Повторите пароль',
            
        ];
    }
}