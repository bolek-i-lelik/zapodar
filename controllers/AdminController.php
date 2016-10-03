<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\User;
use yii\web\Controller;

class AdminController extends \yii\web\Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'index', 'articles'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['articles'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public $user_id;

    public function getUserId(){
    	$user_id = Yii::$app->user->identity->id;
    	return $user_id;
    }

    public function userDostup($id){
    	$dostup = User::find('category_id')->where(['id'=>$id])->one();
    	if($dostup->category_id != 1){
    		return $this->redirect('site/index');
    	}
    }

	public $layout = 'admin';

    public function actionIndex()
    {
    	//Получаем id юзера
    	$id = $this->getUserId();
    	//Проверяем права на вход в админку
    	$this->userDostup($id);

    	$count_users = User::find()->count();

    	return $this->render('index',[
    		'count_users' => $count_users,
    	]);
    }

    public function actionArticles(){

    	//Получаем id юзера
    	$id = $this->getUserId();
    	//Проверяем права на вход в админку
    	$this->userDostup($id);

    	return $this->render('articles');
    }

    

}
