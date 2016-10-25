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

        return $this->render('index',[
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
