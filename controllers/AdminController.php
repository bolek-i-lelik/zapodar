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
use app\models\Products;

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

    	$xml = NULL;

    	$xml = simplexml_load_file('uploads/yml.xml');

    	/*foreach ($xml->shop->offers->offer as $offer) {
    		foreach($offer->picture as $picture){
				$foto = substr($picture, 25);
				if (file_exists('img/products/'.$foto)) {
    				echo "The file $filename exists";
				} else {
    				copy($picture,"img/products/".$foto);
				}

			}
		}*/
		foreach ($xml->shop->offers->offer as $offer) {
			$products = new Products();
			//echo $a.'<br>';
			$products->available = (string)$offer['available'];
			//echo $offer['available'].'<br>';
			$products->productsid = (string)$offer['id'];
			//echo $offer['id'].'<br>';
			$alias = substr((string)$offer->url, 19);
			$alias = substr($alias, 0, -5);
			$products->alias = $alias;
			//echo $offer->url.'<br>';
			$products->price = (string)$offer->price;
			//echo $offer->price.'<br>';
			$products->currencyid = (string)$offer->currencyId;
			//echo $offer->currencyId.'<br>';
			$products->categoryid = (string)$offer->categoryId;
			//echo $offer->categoryId.'<br>';
			$products->pickup = (string)$offer->pickup;
			//echo $offer->pickup.'<br>';
			$products->delivery = (string)$offer->delivery;
			//echo $offer->delivery.'<br>';
			$products->name = (string)$offer->name;
			//echo $offer->name.'<br>';
			$products->vendorcode = (string)$offer->vendoreCode;
			//echo $offer->vendoreCode.'<br>';
			$products->description = (string)$offer->description;
			//echo $offer->description.'<br>';
			$products->sales_notes = (string)$offer->sales_notes;
			$products->vendor = (string)$offer->vendor;
			$products->country = (string)$offer->country_of_origin;
			if($products->save()){
				echo $offer['id'].'сохранено<br>';
			}else{
				echo 'хуй тут ночевал';
			}
			//echo $offer->sales_notes.'<br>';
			//echo $offer->vendorCode.'<br>';
			/*$fotos = '';
			foreach($offer->picture as $picture){
				$foto = substr($picture, 25);
				$fotos .= $foto.',';
			}
			echo $fotos.'<br>';
			print_r($offer->param);
			*/
	//print_r($offer);
	/*echo "<hr>";
	$a= $a+1;*/
}
    	exit();

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

    	//$offers = $xml->shop->offers;

    	return $this->render('uploadproducts');
    }

}
