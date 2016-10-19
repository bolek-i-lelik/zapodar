<?php

namespace app\controllers;

use Yii;
use app\models\Basket;
use app\models\Products;

class BasketController extends \yii\web\Controller
{
    //public $modelClass = 'app\models\Basket';

	public function actionNeworder()
	{

		if(Yii::$app->request->isAjax ){
			$basket = new Basket();
			$postquery = Yii::$app->request->get();
			$basket->product_id = $postquery['product_id'];
			$basket->user_id = $postquery['user_id'];
			$basket->count = 1;
			$basket->save();

			//считаем кол-во товара в корзине на этого юзера
			$products_in_basket = Basket::find()->where(['user_id'=>$postquery['user_id']])->count();
			

			if (!isset(Yii::$app->request->cookies['countbasket'])) {
    			Yii::$app->response->cookies->add(new \yii\web\Cookie([
        			'name' => 'countbasket',
        			'value' => '1',
    			]));
    			$countbasket = 1;
			}else{
				Yii::$app->response->cookies->add(new \yii\web\Cookie([
        			'name' => 'countbasket',
        			'value' => $products_in_basket,
    			]));
    			$countbasket = $products_in_basket;
			}

			$result = array('countbasket'=>$countbasket, 'text'=>'В корзине');

			return json_encode($result);
		}

		

	}

	public function actionBasket()
	{

		$user_id = Yii::$app->user->id;

		$in_basket = Basket::find()->where(['user_id'=>$user_id, 'buy'=>NULL])->all();

		$products = array();

		foreach($in_basket as $product_in_basket){

			$product = Products::find()->where(['productsid' => $product_in_basket->product_id])->one();

			$products[$product_in_basket->product_id] = $product;

		}

		return $this->render('basket', [
			'in_basket' => $in_basket,
			'products' => $products,
		]);

	}
}

