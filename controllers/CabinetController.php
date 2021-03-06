<?php

namespace app\controllers;

use Yii;
use app\models\VpForm;
use app\models\User;
use app\models\Products;
use app\models\Basket;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\Zakaz;

class CabinetController extends \yii\web\Controller
{

	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
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
    		if($user->sex==3){
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

        $zakaz = Zakaz::find()->where(['user_id'=>Yii::$app->user->id])->orderBy('date desc')->all();

        $zakaz_products = array();

        foreach ($zakaz as $zak) {
            $products = Basket::find()->where(['zakaz_id'=>$zak->id])->all();
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
            $zakaz_products[$zak->id] = $history_of_buy;
        }

    	

    	
    	$user = User::find()->where(['id'=>Yii::$app->user->id])->one();

        return $this->render('index',[
        	'user' => $user,
	       	'model' => $model,
	       	'model2' => $model2,
	       	'zakaz_products' => $zakaz_products,
            'zakazen' => $zakaz,
        ]);
    }

}
