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

        return $this->render('index', [
            'news' => $news,
            'products' => $products,
            'sliders' => $sliders,
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
        $request = Yii::$app->request;

        $name = $request->get('name');

        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
            'name' => $name,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionReg()
    {

        $model = new RegForm();

        if($model->load(Yii::$app->request->post())){
            $model->password = md5($model->password);
            $model->password2 = md5($model->password2);
            if($model->save()){
                Yii::$app->session->setFlash('success', 'Данные приняты');
                Yii::$app->session->setFlash('error', '');
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('error', 'Ошибка');
            }
        }
        
        return $this->render('reg', compact('model'));
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
        return $this->render('action');
    }

    public function actionPartner()
    {
        return $this->render('partner');
    }

    public function actionCategory(){

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
        ]);

    }
}
