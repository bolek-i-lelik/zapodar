<?php

namespace app\controllers;

use Yii;
use app\models\Products;

class ProductController extends \yii\web\Controller
{
    public function actionIndex()
    {

    	$request = Yii::$app->request;

        $alias = $request->get('alias');

        $product = Products::find('prosmotr')->where(['alias'=>$alias])->one();

        $product->prosmotr = (string)($product->prosmotr + 1);

        $product->save();

        return $this->render('index',[
        	'product' => $product,
        ]);
    }

}
