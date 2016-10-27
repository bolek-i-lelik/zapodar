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
use app\models\UploadExcel;
use app\models\Config;


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
    	//DostupController::userDostup($id);
        $dostup = User::find('category_id')->where(['id'=>$id])->one();
        if($dostup->category_id != 1){
            return $this->redirect('/');
        }

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
			$products = Products::find()->where(['productsid'=>(string)$offer['id']])->one();
            //echo $a.'<br>';
			//$products->available = (string)$offer['available'];
			//echo $offer['available'].'<br>';
			//$products->productsid = (string)$offer['id'];
			//echo $offer['id'].'<br>';
			//$alias = substr((string)$offer->url, 19);
			//$alias = substr($alias, 0, -5);
			//$products->alias = $alias;
			//echo $offer->url.'<br>';
			//$products->price = (string)$offer->price;
			//echo $offer->price.'<br>';
			//$products->currencyid = (string)$offer->currencyId;
			//echo $offer->currencyId.'<br>';
			//$products->categoryid = (string)$offer->categoryId;
			//echo $offer->categoryId.'<br>';
			
            $products->pickup = (string)$offer->pickup;
			
            //echo $offer->pickup.'<br>';
			
            $products->delivery = (string)$offer->delivery;
			
            //echo $offer->delivery.'<br>';
			//$products->name = (string)$offer->name;
			//echo $offer->name.'<br>';
			//$products->vendorcode = (string)$offer->vendoreCode;
			//echo $offer->vendoreCode.'<br>';
			//$products->description = (string)$offer->description;
			//echo $offer->description.'<br>';
			//$products->sales_notes = (string)$offer->sales_notes;
			//$products->vendor = (string)$offer->vendor;
			//$products->country = (string)$offer->country_of_origin;
            
            $fotos = '';
            foreach($offer->picture as $picture){
                $foto = substr($picture, 25);
                $fotos .= $foto.',';
            }
            $products->picture = $fotos;
            
            //echo $fotos.'<br>';
			
            if($products->save()){
				echo $offer['id'].' изменено <br>';
			}else{
				echo 'неудача,<br>';
			}
			
            //echo $offer->sales_notes.'<br>';
			//echo $offer->vendorCode.'<br>';
			
			
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

    public function actionUpload()
    {
        $model = new UploadExcel();

        $config_new = Config::find()->one();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('upload', [
            'model' => $model,
            'config_new' => $config_new,
        ]);
    }

    public function actionUpdatedb()
    {

        try
        {
            $inputFileType = \PHPExcel_IOFactory::identify('uploads/products.xlsx');
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load('uploads/products.xlsx');
        }catch(Exception $e)
        {
            die('Error');
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $highestColumn = 'BA';

        $np = 0;
        $up = 0;
        for( $row = 1; $row <= $highestRow; $row++)
        {
            $rowData = $sheet->rangeToArray('A'.$row .':'.$highestColumn.$row,NULL,TRUE,FALSE);

            foreach($rowData as $value ){

                

                //разбираем фотографии и загружаем в папку с фотками если их нет
                $fotos = '';

                $photos = explode(", ", $value[11]);
                foreach ($photos as $photo) {
                    $foto = substr($photo, 25);
                    if (file_exists('img/products/'.$foto)) {
                        //echo "Файл в наличии";
                    } else {
                        $config_foto = Config::find()->one();
                        if($config_foto->upoloadfoto == 1){
                            copy($photo,"img/products/".$foto);
                        }
                        //copy($photo,"img/products/".$foto);
                        //echo 'Файл не загружен<br>';
                    }
                        
                    $fotos .= $foto.',';
                }
                //составляем строку с параметрами

                $count = count($value);

                $param = '';

                for($i = 28; $i <= $count-2; $i = $i+3){
                    $param .= $value[$i].','.$value[$i+2].','.$value[$i+1].'|';
                }

                //Генерируем alias

                $alias = $this->str2url($value[1]);
                //echo $alias; exit();

                //проверяем есть ли такой продукт в базе
                $product = Products::find()->where(['productsid'=>$value[19]])->one();

                    //var_dump($product);

                    if($product['productsid']){
                        $product->alias = 'p'.$value[19].'-'.$alias;
                        $product->vendorcode = $value[0];
                        $product->keywords = $value[2];
                        $product->description = $value[3];
                        $product->name = $value[1];
                        $product->price = $value[5];
                        $product->edinica = $value[7];
                        $product->nalichie = $value[12];
                        $product->count = $value[13];
                        $product->group_id = $value[14];
                        $product->podrazdelid = $value[21];
                        $product->vendor = $value[23];
                        $product->picture = $fotos;
                        $product->garantie = $value[24];
                        $product->country = $value[25];
                        $product->sale = $value[26];
                        $product->params = $param;
                        $product->save();
                        //echo 'продукт '.$value[19].' обновлён';
                        //echo $a;
                        $up++;
                    }else{
                        $product = new Products();
                        $product->alias = 'p'.$value[19].'-'.$alias;
                        $product->price = $value[5];
                        $product->categoryid = $value[14];
                        $product->currencyid = $value[6];
                        $product->picture = $fotos;
                        $product->name = $value[1];
                        $product->description = $value[3];
                        $product->group_id = $value[14];
                        $product->params = $param;
                        $product->productsid = $value[19];
                        $product->vendorcode = $value[0];
                        $product->vendor = $value[23];
                        $product->country = $value[25];
                        $product->edinica = $value[7];
                        $product->nalichie = $value[12];
                        $product->count = $value[13];
                        $product->podrazdelid = $value[21];
                        $product->garantie = $value[24];
                        $product->sale = $value[26];
                        $product->keywords = $value[2];
                        $product->available = TRUE;
                        $product->save();
                        //echo 'продукт '.$value[19].' создан';
                        //echo $a;
                        $np++;
                    }

            }
            
            //var_dump($rowData);exit();
            //echo '<hr>';
        }

        
       
        return $this->render('updatedb',[
            'up' => $up,
            'np' => $np,
            'highestRow' => $highestRow,
        ]);
    }

    protected function rus2translit($string) {
        $converter = array(
            'а' => 'a',   'б' => 'b',   'в' => 'v',
            'г' => 'g',   'д' => 'd',   'е' => 'e',
            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
            'и' => 'i',   'й' => 'y',   'к' => 'k',
            'л' => 'l',   'м' => 'm',   'н' => 'n',
            'о' => 'o',   'п' => 'p',   'р' => 'r',
            'с' => 's',   'т' => 't',   'у' => 'u',
            'ф' => 'f',   'х' => 'h',   'ц' => 'c',
            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
            'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
            'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
        
            'А' => 'A',   'Б' => 'B',   'В' => 'V',
            'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
            'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
            'И' => 'I',   'Й' => 'Y',   'К' => 'K',
            'Л' => 'L',   'М' => 'M',   'Н' => 'N',
            'О' => 'O',   'П' => 'P',   'Р' => 'R',
            'С' => 'S',   'Т' => 'T',   'У' => 'U',
            'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
            'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
            'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
            'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
        );
        return strtr($string, $converter);
    }

    protected function str2url($str) {
        // переводим в транслит
        $str = $this->rus2translit($str);
        // в нижний регистр
        $str = strtolower($str);
        // заменям все ненужное нам на "-"
        $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
        // удаляем начальные и конечные '-'
        $str = trim($str, "-");
        return $str;
    }

    public function actionCatfoto()
    {

        $cats = Category::find()->all();

        foreach ($cats as $cat) {
            if(empty($cat->picture)){
                if(!Products::find()->where(['categoryid'=>$cat->id])){
                    $cat_id = $this->catrecurs($cat->id);
                }
                else{$cat_id = $cat->id;}

                $product = Products::find()->where(['categoryid'=>$cat_id])->one();
                $cat->picture = stristr($product['picture'], ',', true);
                $cat->save();
                echo 'Сохранено<hr>'.$cat->picture;
            }
        }
        exit();
    }

    protected function catrecurs($id)
    {
        $cats_id = Category::find()->where(['parent'=>$id])->one();
        if(!Products::find()->where(['categoryid'=>$cats_id])){
            $this->catrecurs($cats_id);
        }
        return $cats_id;
    }

    public function actionUpuploadfoto()
    {
        if(Yii::$app->request->isAjax ){

            $getquery = Yii::$app->request->get();
            $config_new = Config::find()->one();
            $config_new->upoloadfoto = $getquery['upoloadfoto'];
            $config_new->save();
        }
    }

    public function actionDownuploadfoto()
    {
        if(Yii::$app->request->isAjax ){

            $getquery = Yii::$app->request->get();
            $config_new = Config::find()->one();
            $config_new->upoloadfoto = $getquery['upoloadfoto'];
            $config_new->save();
        }
    }

}
