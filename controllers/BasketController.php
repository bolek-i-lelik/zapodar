<?php

namespace app\controllers;

use Yii;
use app\models\Basket;
use app\models\Products;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\Zakaz;
use app\models\User;
use app\models\Articles;
use app\models\Question;
use app\models\Hlep;

class BasketController extends \yii\web\Controller
{
    //public $modelClass = 'app\models\Basket';

	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'basket'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['basket'],
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
			$products_in_basket = Basket::find()->where(['user_id'=>$postquery['user_id']])->andWhere(['buy'=>NULL])->count();
			

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

	public function actionDeleteoneproduct()
	{
		if(Yii::$app->request->isAjax ){
			
			$getquery = Yii::$app->request->get();
			$id = $getquery['id'];
			$basket = Basket::find()->where(['id'=>$id])->one();
			$basket->delete();

			$products_in_basket = Basket::find()->where(['user_id'=>$getquery['user']])->count();

			Yii::$app->response->cookies->add(new \yii\web\Cookie([
        			'name' => 'countbasket',
        			'value' => $products_in_basket,
    			]));
		}
	}

	public function actionMinus()
	{
		if(Yii::$app->request->isAjax ){
			
			$getquery = Yii::$app->request->get();
			$id = $getquery['id'];
			$count = $getquery['count'];
			$basket = Basket::find()->where(['id'=>$id])->one();
			$basket->count = $count;
			$basket->save();
			
		}
	}

	public function actionPlus()
	{
		if(Yii::$app->request->isAjax ){
			
			$getquery = Yii::$app->request->get();
			$id = $getquery['id'];
			$count = $getquery['count'];
			$basket = Basket::find()->where(['id'=>$id])->one();
			$basket->count = $count;
			$basket->save();
			
		}
	}

	public function actionDeleteall()
	{
		if(Yii::$app->request->isAjax ){
			
			$getquery = Yii::$app->request->get();
			$user_id = $getquery['user_id'];

			$basket_count = Basket::find()->where(['user_id'=>$user_id])->andWhere(['buy'=> NULL])->count();
			for($i=1; $i<=$basket_count; $i++){
				$basket = Basket::find()->where(['user_id'=>$user_id])->andWhere(['buy'=> NULL])->one();
				$basket->delete();
			}

			$products_in_basket = Basket::find()->where(['user_id'=>$getquery['user_id']])->count();

			Yii::$app->response->cookies->add(new \yii\web\Cookie([
        			'name' => 'countbasket',
        			'value' => $products_in_basket,
    			]));
			
		}
	}

	public function actionBasket()
	{
		$admin = User::find()->where(['category_id'=>1])->one();

		$hleps = Hlep::find()->where(['pokaz'=>1])->all();

		$model = new Question();

		if($model->load(Yii::$app->request->post())){
            if($model->save()){

            	Yii::$app->mailer->compose()
                    ->setTo($model->email)
                    ->setSubject('Сообщение с сайта zapodar.com')
                    ->setTextBody('Мы получили Ваше сообщение и ответим Вам в ближайшее время.')
                    ->send();

                Yii::$app->mailer->compose()
                    ->setTo($admin->e_mail)
                    ->setSubject('Получено сообщение с сайта zapodar.com')
                    ->setTextBody('Посетитель '.$model->familie.' '.$model->name.' '.$model->father.'(email: '.$model->email.') оставил сообщение (задал вопрос): '.$model->text)
                    ->send();

            	Yii::$app->session->setFlash('success', 'Данные приняты');
                Yii::$app->session->setFlash('error', '');
                return $this->redirect('/basket');
            }else{
                Yii::$app->session->setFlash('error', 'Ошибка');
            }
        }

		$user_id = Yii::$app->user->id;

		$user = User::find()->where(['id'=>$user_id])->one();

		$texts = array();

		$dostavka = Articles::find()->where(['alias'=>'dostavka'])->one();
		$texts['dostavka'] = $dostavka;
		$oplata = Articles::find()->where(['alias'=>'oplata'])->one();
		$texts['oplata'] = $oplata;
		$zakaz = Articles::find()->where(['alias'=>'zakaz'])->one();
		$texts['zakaz'] = $zakaz;

		$in_basket = Basket::find()->where(['user_id'=>$user_id, 'buy'=>NULL])->all();

		$products = array();

		foreach($in_basket as $product_in_basket){

			$product = Products::find()->where(['productsid' => $product_in_basket->product_id])->one();

			$products[$product_in_basket->product_id] = $product;

		}

		return $this->render('basket', [
			'in_basket' => $in_basket,
			'products' => $products,
			'user' => $user,
			'texts' => $texts,
			'model' => $model,
			'hleps' => $hleps,
		]);

	}

	public function actionNewzakaz()
	{

		if(Yii::$app->request->isAjax ){
			
			$getquery = Yii::$app->request->get();
			$user_id = $getquery['user_id'];
			
			$zakaz = new Zakaz();
			$zakaz->user_id = $user_id;
			$zakaz->sost = 1;
			$zakaz->save();

			$product_in_basket = Basket::find()->where(['user_id'=>$user_id])->andWhere(['buy'=>NULL])->all();
			foreach ($product_in_basket as $value) {
				$prod = Basket::find()->where(['id'=>$value->id])->one();
				$prod->zakaz_id = $zakaz->id;
				$prod->sost = '1';
				$prod->buy = 1;
				$prod->save();

				$buyer = Products::find()->where(['productsid'=>$prod->product_id])->one();
				$buyer->buy = $buyer->buy + 1;
				$buyer->save();
			}
			
			//Получаем почтовые ящики администраторов
            $admins = User::find()->where(['category_id'=>1])->all();
            //Отправляем письма администраторам
            foreach ($admins as $admin) {
                Yii::$app->mailer->compose()
                    ->setTo($admin->e_mail)
                    ->setSubject('Заказ с сайта zapodar.com')
                    ->setTextBody('Поступил заказ пройдите в административную панель, чтобы просмотреть подробности ')
                    ->send();
            }


			Yii::$app->response->cookies->add(new \yii\web\Cookie([
        			'name' => 'countbasket',
        			'value' => 0,
    			]));
			
		}

	}
}

