<?php

namespace app\controllers;

use Yii;
use app\models\Articles;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\User;
use app\models\ArticlesSearch;
use app\models\Category;
use app\models\Products;

/**
 * ArticleController implements the CRUD actions for Articles model.
 */
class NewproductsController extends Controller
{
    public $layout = 'admin';
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'index', 'view', 'create', 'update', 'delete'],
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
                        'actions' => ['view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
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

    /**
     * Lists all Articles models.
     * @return mixed
     */
    public function actionIndex()
    {

        //Получаем id юзера
        $idu = $this->getUserId();
        //Проверяем права на вход в админку
        $this->userDostup($idu);
        include 'files/deko_jshopping_categories.php';
        //var_dump($deko_jshopping_categories);exit();
        //$homepage = file_get_contents('files/deko_jshopping_categories.php');
		foreach ($deko_jshopping_categories as $cat) {
			//var_dump($page);
			//echo '<hr>';
			$categ = Category::find()->where(['id'=>$cat['category_id']])->one();
			/*if(isset($categ['id'])){
				if($categ->delete()){
					echo "удалена категория<br>";
				}
			}*/
			if(empty($categ['id'])){

				$category = new Category();

				$category->id = $cat['category_id'];
				$category->name = $cat['name_ru-RU'];
				if($cat['category_id'] == 1){
					$category['parent'] = 0;
				}else{
					if($cat['category_parent_id'] == 0){
						$category->parent = 1;
					}else{
						$deko_cat = Category::find()->where(['deko_id'=>$cat['category_parent_id']])->one();
						$category->parent = $deko_cat['id'];
					}
				}


				
				$category->pokaz = 1;
				$category->picture = $cat['category_image'];
				$category->meta_title = $cat['meta_title_ru-RU'];
				$category->meta_keywords = $cat['meta_keyword_ru-RU'];
				$category->meta_description = $cat['meta_description_ru-RU'];
				$category->text = $cat['description_ru-RU'];
				$category->deko_id = $cat['category_id'];
				$category->deko_parent = $cat['category_parent_id'];
				if($category->save()){
					echo 'Создана новая категория - '.$category->meta_title.'<br>';
				}else{
					echo 'Не создана новая категория - '.$category->meta_title.'<br>';
				}
			}/*else{
				$deko_cat = Category::find()->where(['id'=>$cat['category_id']])->one();
				if($deko_cat->delete()){
					echo "удалена категория";
				}
			}*/
		}
		exit();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionProducts(){

    	//Получаем id юзера
        $idu = $this->getUserId();
        //Проверяем права на вход в админку
        $this->userDostup($idu);
        include 'files/deko_jshopping_products.php';
        //var_dump($deko_jshopping_products);exit();
        
        //$homepage = file_get_contents('files/deko_jshopping_categories.php');exit();
		foreach ($deko_jshopping_products as $prod) {
			var_dump($prod);exit();
			//echo '<hr>';
			$prods = Products::find()->where(['productsid'=>$prod['product_id']])->one();
			if(empty($prods['id'])){
				$product = new Products();

				$product->id = $prod['product_id'];
				$product->alias = $this->str2url($prod['name_ru-RU']);
				$product->name = $prod['name_ru-RU'];
				$product->price = $prod['product_price'] * 51;
				$product->currencyid = $prod['currency_id'];
				$product->picture = $prod['product_name_image'];
				$product->description = $prod['description_ru-RU'];
				$product->available = 1;
				$product->nalichie = 1;
                $product->vendorcode = (string)$prod['product_ean'];
				$product->productsid = $prod['product_id'];
				$product->keywords = $prod['meta_keyword_ru-RU'];
				if($product->save()){
					echo 'Создан новый продукт - '.$product->name.'<br>';
				}else{
					echo 'Не создан новый продукт - '.$product->name.'<br>';
				}
			}else{
                echo 'продукт уже существует';
            }
            /*else{
                $deko_prod = Products::find()->where(['id'=>$prod['product_id']])->one();
                if($deko_prod->delete()){
                    echo "удален продукт";
                }
            }*/
		}
		exit();

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

    public function actionProdcat()
    {

    	//Получаем id юзера
        $idu = $this->getUserId();
        //Проверяем права на вход в админку
        $this->userDostup($idu);
        include 'files/deko_jshopping_products_to_categories.php';
        //var_dump($deko_jshopping_products_to_categories);exit();
        
        //$homepage = file_get_contents('files/deko_jshopping_categories.php');exit();
		foreach ($deko_jshopping_products_to_categories as $deko) {
			//var_dump($page);
			//echo '<hr>';
			$prod = Products::find()->where(['productsid'=>$deko['product_id']])->one();
			$prod->categoryid = $deko['category_id'];			
				if($prod->save()){
					echo 'Привязан продукт - '.$prod['name'].'<br>';
				}else{
					echo 'Не привязан продукт - '.$prod['name'].'<br>';
				}
		}
		exit();

    }
    
}

