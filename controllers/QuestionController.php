<?php

namespace app\controllers;

use Yii;
use app\models\Question;
use app\models\QuestionSearch;
use app\models\Questionadmin;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\controllers\DostupController;

/**
 * QuestionController implements the CRUD actions for Question model.
 */
class QuestionController extends Controller
{

    public $layout = 'admin';
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Question models.
     * @return mixed
     */
    public function actionIndex()
    {
        //Получаем id юзера
        $idu = DostupController::getUserId();
        //Проверяем права на вход в админку
        DostupController::userDostup($idu);

        $searchModel = new QuestionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Question model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        //Получаем id юзера
        $idu = DostupController::getUserId();
        //Проверяем права на вход в админку
        DostupController::userDostup($idu);

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Question model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        //Получаем id юзера
        $idu = DostupController::getUserId();
        //Проверяем права на вход в админку
        DostupController::userDostup($idu);

        $model = new Questionadmin();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Question model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        //Получаем id юзера
        $idu = DostupController::getUserId();
        //Проверяем права на вход в админку
        DostupController::userDostup($idu);

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            //var_dump($model);exit();
            $quest = Questionadmin::find()->where(['id'=>$id])->one();
            $quest->sost = $model->sost;
            if($quest->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Question model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //Получаем id юзера
        $idu = DostupController::getUserId();
        //Проверяем права на вход в админку
        DostupController::userDostup($idu);

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Question model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Question the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Questionadmin::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
