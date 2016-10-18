<?php

namespace app\controllers;

use Yii;
use app\models\Products;
use app\models\Basket;


class ProductController extends \yii\web\Controller
{
    public function actionIndex()
    {

    	$request = Yii::$app->request;

        $alias = $request->get('alias');

        $product = Products::find('prosmotr')->where(['alias'=>$alias])->one();

        $product->prosmotr = (string)($product->prosmotr + 1);

        $product->save();

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
        ]);
    }

}
