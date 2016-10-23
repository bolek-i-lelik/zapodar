<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\RegForm;
use app\models\ContactForm;
use app\models\Signup;
use app\models\User;
use app\models\Category;
use app\models\Products;
use yii\data\Pagination;
use app\controllers\NewController;
use app\models\Slider;
use app\models\Articles;
use app\controllers\ArticleController;
use yii\helpers\Url;
use app\models\VostparolForm;
use app\models\Vastparol;
use app\models\VpForm;
use app\models\Messages;


class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
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
 
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        $news = NewController::populationNews();

        $count_all_products = Products::find()->count();

        //echo $count_all_products; exit();

        $rand_int = array();

        for($i=1; $i<=5; $i++){
            $num = rand(1, $count_all_products);
            $rand_int[] = $num;
        }

        //var_dump($rand_int); echo '<br>';

        $products = array();

        for($i=0; $i<=4; $i++){
            //echo $rand_int[$i].'<br>';
            //$product = Products::find()->limit($rand_int[$i])->one();
            //$product = Products::findBySql('SELECT * FROM `products` LIMIT '.$rand_int[$i].', 1');

            $db = new yii\db\Connection([
                'dsn' => 'mysql:host=localhost;dbname=zapodar',
                'username' => 'root',
                'password' => '050184',
                'charset' => 'utf8',
            ]);

            $product = Yii::$app->db->createCommand('SELECT * FROM `products` LIMIT '.$rand_int[$i].', 1')
           ->queryOne();

            //var_dump($product);
            //$fotos = $product->picture;
            $fotos = explode(",", $product['picture']);
            $product['picture'] = $fotos[0];

            $group = Category::find()->where(['id'=>$product['group_id']])->one();
            $product['group_id'] = $group->name;

            $products[$i] = $product;
        }

        //Получение информации для слайдера

        $sliders = Slider::find()->all();

        //Получение статьи
        $article = Articles::find()->where(['ishome'=>1])->one();

        return $this->render('index', [
            'news' => $news,
            'products' => $products,
            'sliders' => $sliders,
            'article' => $article,
        ]); 
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $url = Url::to('');

        $article = ArticleController::getArticle($url);

        return $this->render('contact', [
            'article' => $article,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {

        $url = Url::to('');

        $article = ArticleController::getArticle($url);

        return $this->render('about', [
            'article' => $article,
        ]);
    }

    public function actionReg()
    {

        $model = new RegForm();

        if($model->load(Yii::$app->request->post())){
            $model->password = md5($model->password);
            $model->password2 = md5($model->password2);
            $model->username = $model->e_mail;
            if($model->save()){
                Yii::$app->session->setFlash('success', 'Данные приняты');
                Yii::$app->session->setFlash('error', '');
                return $this->redirect('/login');
            }else{
                Yii::$app->session->setFlash('error', 'Ошибка');
            }
        }
        
        return $this->render('reg', [
            'model'=>$model,
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            ]);
    }

    public function actionCatalog()
    {

        $category = Category::find()->where(['parent'=>0, 'pokaz'=>1])->all();

        $subcategory = array();

        foreach ($category as $value) {
            $id = $value->id;
            $sub = Category::find()->where(['parent'=>$id])->all();
            $subcategory[$id] = $sub;
        }

        return $this->render('catalog',[
            'category' => $category,
            'subcategory' => $subcategory,
        ]);
    }

    public function actionAction()
    {

        $url = Url::to('');

        $article = ArticleController::getArticle($url);

        return $this->render('action', [
            'article' => $article,
        ]);
        
    }

    public function actionPartner()
    {
        $url = Url::to('');

        $article = ArticleController::getArticle($url);

        return $this->render('partner', [
            'article' => $article,
        ]);

        
    }

    public function actionCategory(){

        if (!Yii::$app->user->isGuest) {
            $guest = FALSE;
        }else{
            $guest = TRUE;
        }

        $request = Yii::$app->request;

        $id = $request->get('id');

        $subcategory = Category::find()->where(['parent' => $id])->one();

        if($subcategory = Category::find()->where(['parent' => $id])->one()){
            $results = Category::find()->where(['parent'=>$id])->all();
            $tip = 1;
            $models = 0;
        }
        else
        {
            $query = Products::find('alias', 'picture', 'name', 'price')->where(['categoryid'=>$id]);
            $tip = 2;

            $count = Products::find()->where(['categoryid'=>$id])->count();

            $results = new Pagination(['totalCount' => $count, 'pageSize' => 18]);

            $models = $query->offset($results->offset)
                ->limit($results->limit)
                ->all();
        }

        return $this->render('category', [
            'models' => $models,
            'results' => $results,
            'tip' => $tip,
            'guest' => $guest,
        ]);

    }

    public function actionNewparol()
    {
        $model = new VostparolForm();

        if($model->load(Yii::$app->request->post())){

            //var_dump($model); exit();
            
            $secret_key = md5($model->username);

            $email = $model->username;

            $user = User::find()->where(['username'=>$email])->one();

            $vastparol = Vastparol::find()->where(['username'=>$email])->one();
            if(!empty($vastparol->id)){
                $vastparol->delete();
            }

            if(isset($user)){
                $vastparol = new Vastparol();
                $vastparol->secret_key = $secret_key;
                $vastparol->date_valid_secret_key = time();
                $vastparol->username = $email;
                $vastparol->save();

                Yii::$app->mailer->compose()
                    ->setTo($email)
                    ->setSubject('Восстановление пароля на сайте zapodar.com')
                    ->setTextBody('Для восстановления пароля пройдите пожалуйста по ссылке: http://buhcomfort.ru/vp/'.$secret_key)
                    ->send();
                
                Yii::$app->session->setFlash('success', 'Перейдите пожалуйста на вашу почту и следуйте инструкциям в письме.');
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('error', 'Пользователь с таким email не найден');
            }

        }
        
        return $this->render('newparol', compact('model'));
    }

    public function actionVp()
    {
        $model = new VpForm();

        if($model->load(Yii::$app->request->post())){

            $get = Yii::$app->request->get();
            $secret_key = $get['secret_key'];

            $vastparol = Vastparol::find()->where(['secret_key' => $secret_key])->one();

            $time_ostatok = time() - $vastparol['date_valid_secret_key'];

            if($time_ostatok > 0){
                $password = md5($model->password);
                $password2 = md5($model->password2);
                if($password2 == $password){
                    
                    $user = User::find()->where(['e_mail'=>$vastparol['username']])->one();
                    $user->password = $password;
                    $user->save();
                    return $this->redirect('/login');
                }
            }else{
                return $this->redirect('newparol', ['error'=>'Время истекло, повторите попытку']);
            }
        }
        return $this->render('vp', ['model' => $model]);

    }

    public function actionMessage()
    {
        if(Yii::$app->request->isAjax ){
            //получаем массив с данными
            $getquery = Yii::$app->request->get();
            //Вносим обращение в базу данных
            $message = new Messages();
            $message->name = htmlspecialchars((trim($getquery['name'])));
            $message->phone = htmlspecialchars((trim($getquery['phone'])));
            $message->email = htmlspecialchars((trim($getquery['email'])));
            $message->text = htmlspecialchars((trim($getquery['text'])));
            $message->save();
            //Получаем почтовые ящики администраторов
            $admins = User::find()->where(['category_id'=>1])->all();
            //Отправляем письма администраторам
            foreach ($admins as $admin) {
                Yii::$app->mailer->compose()
                    ->setTo($admin->e_mail)
                    ->setSubject('Сообщение с сайта zapodar.com')
                    ->setTextBody('Посетитель '.$getquery['name'].' оставил Вам сообщение: '.$getquery['text'].'. Телефон: '.$getquery['phone'].', email: '.$getquery['email'])
                    ->send();
            }

            return 'Сообщение принято, мы с Вами обязательно свяжемся!';
        }
    }

}
