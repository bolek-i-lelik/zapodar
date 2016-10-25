<?php

namespace app\controllers;

use Yii;
use app\models\VpForm;
use app\models\User;
use app\models\Products;
use app\models\Basket;

class CabinetController extends \yii\web\Controller
{

	public function actionIndex()
    {
    	$model = new VpForm();
    	$model2 = new User();

    	if($model->load(Yii::$app->request->post())){
    		$user = User::find()->where(['id'=>Yii::$app->user->id])->one();
    		$password = md5($model->password);
    		$password2 = md5($model->password2);
    		if($password != $password2){
    			Yii::$app->session->setFlash('success', 'Пароли не совпадают');
    		}else{
    			$user->password = $password;
    			if($user->save()){
                	Yii::$app->session->setFlash('success', 'Данные приняты');
                	Yii::$app->session->setFlash('error', '');
                	return $this->redirect('/cabinet');
            	}else{
                	Yii::$app->session->setFlash('error', 'Ошибка');
            	}
        	}
    	}

    	if($model2->load(Yii::$app->request->post())){
    		$user = User::find()->where(['id'=>Yii::$app->user->id])->one();
    		if(empty($user->sex)){
    			$user->sex = $model2->sex;
    		}
    		if(empty($user->info)){
    			$user->info = $model2->info;
    		}
    		if(empty($user->born)){
    			$user->born = $model2->born;
    		}
    		if($user->save()){
    			Yii::$app->session->setFlash('success', 'Данные приняты');
                Yii::$app->session->setFlash('error', '');
                return $this->redirect('/cabinet');
    		}else{
               	Yii::$app->session->setFlash('error', 'Ошибка');
            }

    	}

    	$products = Basket::find()->where(['user_id'=>Yii::$app->user->id])->andWhere(['buy'=>1])->all();
    	$history_of_buy = array();
    	foreach ($products as $product) {
    		$prod = Products::find()->where(['productsid'=>$product->product_id])->one();
    		$prod_buy = array();
    		$prod_buy['name'] = $prod->name;
    		$prod_buy['alias'] = $prod->alias;
    		$prod_buy['picture'] = stristr($prod->picture, ',', true);
    		$prod_buy['count'] = $product->count;
    		$prod_buy['date'] = $product->date;
    		$history_of_buy[] = $prod_buy;
    	}

    	
    	$user = User::find()->where(['id'=>Yii::$app->user->id])->one();

        return $this->render('index',[
        	'user' => $user,
	       	'model' => $model,
	       	'model2' => $model2,
	       	'history_of_buy' => $history_of_buy,
        ]);
    }

}
