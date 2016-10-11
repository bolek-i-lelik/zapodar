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
        return $this->render('index');
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

    public function actionNews()
    {
        return $this->render('news');
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
            $query = Products::find()->where(['categoryid'=>$id]);
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
