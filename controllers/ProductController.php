<?php
namespace app\controllers;
use Yii;
use app\models\Products;
use app\models\Basket;
use app\models\Category;

class ProductController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $request = Yii::$app->request;
        $alias = $request->get('alias');
        $product = Products::find('prosmotr')->where(['alias'=>$alias])->one();
        $product_id = $product->categoryid;
        $product->prosmotr = (string)($product->prosmotr + 1);
        $product->save();
        //формируем хлебные крошки
        $bread = array();
        $bread = $this->breadcrumbs($product_id, $bread);
        $bread = array_reverse($bread);
        if(Yii::$app->user->isGuest){
            $guest = TRUE;
            
            $onbasket = FALSE;           
        }else{
            $guest = FALSE;
            $user_id = Yii::$app->user->id;
            $basket = Basket::find()->where(['user_id'=>$user_id, 'product_id'=>$product->productsid])->one();
            if($basket){
                $onbasket = TRUE;
            }else{
                $onbasket = FALSE;
            }
            
        }

        //получаем 5 продуктов
        $count_all_products = Products::find()->count();

        $rand_int = array();

        for($i=1; $i<=5; $i++){
            $num = rand(1, $count_all_products);
            $rand_int[] = $num;
        }

        $products_5 = array();

        for($i=0; $i<=4; $i++){
            
            $db = new yii\db\Connection([
                'dsn' => 'mysql:host=localhost;dbname=zapodar',
                'username' => 'root',
                'password' => '050184',
                'charset' => 'utf8',
            ]);

            $product_5 = Yii::$app->db->createCommand('SELECT * FROM `products` LIMIT '.$rand_int[$i].', 1')
           ->queryOne();

            $fotos = explode(",", $product_5['picture']);
            $product_5['picture'] = $fotos[0];

            $group = Category::find()->where(['id'=>$product_5['group_id']])->one();
            $product_5['group_id'] = $group->name;

            $products_5[$i] = $product_5;
        }


        return $this->render('index',[
            'products' => $products_5,
            'product' => $product,
            'guest' => $guest,
            'onbasket' => $onbasket,
            'bread' => $bread,
        ]);
    }

    protected function breadcrumbs($id, $bread)
    {
        $cat_parent = Category::find()->where(['id'=>$id])->one();
        $bread[] = $cat_parent;
        if($cat_parent['parent']){
            $cat_parent = Category::find()->where(['id'=>$cat_parent['parent']])->one();
            $bread[] = $cat_parent;
            if($cat_parent['parent']){
                $cat_parent = Category::find()->where(['id'=>$cat_parent['parent']])->one();
                $bread[] = $cat_parent;
                if($cat_parent['parent']){
                    $cat_parent = Category::find()->where(['id'=>$cat_parent['parent']])->one();
                    $bread[] = $cat_parent;
                    if($cat_parent['parent']){
                        $cat_parent = Category::find()->where(['id'=>$cat_parent['parent']])->one();
                        $bread[] = $cat_parent;
                    }
                }
            }
        }
        return $bread;
    }
}
