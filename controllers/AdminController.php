<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\User;
use yii\web\Controller;
use app\controllers\DostupController;
use app\models\UploadXML;
use yii\web\UploadedFile;

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
                'only' => ['logout', 'index', 'articles', 'uploadXML'],
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
                    [
                        'actions' => ['uploadXML'],
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

  	public $layout = 'admin';

    public function actionIndex()
    {
    	//Получаем id юзера
    	$id = DostupController::getUserId();
    	//Проверяем права на вход в админку
    	DostupController::userDostup($id);

    	$count_users = User::find()->count();

    	return $this->render('index',[
    		'count_users' => $count_users,
    	]);
    }

    public function actionArticles()
    {

    	//Получаем id юзера
    	$id = DostupController::getUserId();
    	//Проверяем права на вход в админку
    	DostupController::userDostup($id);

    	return $this->render('articles');
    }

    public function actionUploadxml()
    {

    	$id = DostupController::getUserId();
    	DostupController::userDostup($id);

    	$model = new UploadXML();

        if (Yii::$app->request->isPost) {
            $model->xmlFile = UploadedFile::getInstance($model, 'xmlFile');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('uploadxml', ['model' => $model]);

    }

    public function actionUploadxmlfromnet()
    {

    	$id = DostupController::getUserId();
    	DostupController::userDostup($id);

    	$xml = simplexml_load_file('uploads/categories.xml');

    	return $this->render('uploadxmlfromnet', ['xml' => $xml]);

    }

}
