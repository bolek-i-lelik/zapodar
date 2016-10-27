<?php

namespace app\controllers;

use Yii;
use app\models\Statistic;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\controllers\DostupController;

/**
 * StatisticController implements the CRUD actions for Statistic model.
 */
class StatisticController extends Controller
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
     * Lists all Statistic models.
     * @return mixed
     */
    public function actionIndex()
    {
        //Получаем id юзера
        $idu = DostupController::getUserId();
        //Проверяем права на вход в админку
        DostupController::userDostup($idu);

        $dataProvider = new ActiveDataProvider([
            'query' => Statistic::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Statistic model.
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
     * Creates a new Statistic model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        //Получаем id юзера
        $idu = DostupController::getUserId();
        //Проверяем права на вход в админку
        DostupController::userDostup($idu);

        $model = new Statistic();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Statistic model.
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Statistic model.
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
     * Finds the Statistic model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Statistic the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Statistic::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
