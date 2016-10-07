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
use app\models\Category;

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

    	$pokaz = 1;
    	//var_dump($xml);
    	//перебираем построчно все категории
    	foreach ($xml->category as $cat){
    		//var_dump($cat['id']);
			//print($cat['id'].' - '.$cat['parentId'].' - '. $cat.'<br>');
			$caty = Category::find()->where(['id' => (string)$cat['id']])->one();
			if($caty['id']==0){

    			$category = new Category();
    			$id = $cat['id'];
    			$parent = $cat['parentId'];
    			$category->id = (string)$id;
				$category->name = (string)$cat;
				$category->parent = (string)$parent;
				$category->pokaz = $pokaz;
				$category->save();

			}else{
				$catbd = Category::find()->where(['id'=>(string)$cat['id']])->one();
				$catbd->parent = (string)$cat['parentId'];
				$catbd->name = (string)$cat;
				$catbd->save();
			}
		//проверяем наличие такой записи в БД, если нет, то вносим новую запись, если есть то делаем апдейт
    	}
    	$categories = Category::find()->all();

    	return $this->render('uploadxmlfromnet', ['categories' => $categories]);

    }

    public function actionUploadproducts()
    {
    	$id = DostupController::getUserId();
    	DostupController::userDostup($id);

    	$xml = simplexml_load_file('uploads/yml.xml');

    	copy("http://royalpotolok.ru/images/glavnaja-1.jpg","img/products/1.jpg");

    	

    	/*$prices = array();

    	foreach($xml->offers as $offer){
    		var_dump($offer);
    		echo "<hr>";

    	}
		*/

    	//var_dump($xml->offers);

    	/*foreach ($xml->shop->offers as $offer) {
    		print_r($offer);
    		echo '<hr>';
    	}*/

    	$offers = $xml->shop->offers;

    	return $this->render('uploadproducts', ['offers' => $offers]);
    }

}
