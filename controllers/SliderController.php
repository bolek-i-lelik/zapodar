<?php

namespace app\controllers;

use Yii;
use app\models\Slider;
use app\models\SliderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadImage;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use app\controllers\DostupController;

/**
 * SliderController implements the CRUD actions for Slider model.
 */
class SliderController extends Controller
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
                'only' => ['logout', 'index', 'view', 'image', 'create', 'update', 'delete'],
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
                        'actions' => ['image'],
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
     * Lists all Slider models.
     * @return mixed
     */
    public function actionIndex()
    {

        //Получаем id юзера
        $idu = DostupController::getUserId();
        //Проверяем права на вход в админку
        DostupController::userDostup($idu);

        $searchModel = new SliderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Slider model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        //Получаем id юзера
        $idu = DostupController::getUserId();
        //Проверяем права на вход в админку
        DostupController::userDostup($idu);

        $slider = Slider::find()->where(['id'=>$id])->one();

        if($slider->image == NULL){
            return $this->redirect(['image', 'id'=>$id]);
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionImage()
    {

        //Получаем id юзера
        $idu = DostupController::getUserId();
        //Проверяем права на вход в админку
        DostupController::userDostup($idu);

        $model = new UploadImage();

        $request = Yii::$app->request;

        $id = $request->get('id');

        //echo $id; exit();

        if ($model->load(Yii::$app->request->post())) {
            $model->image = UploadedFile::getInstance($model, 'image');
            $model->upload($id);
            $slider = Slider::find()->where(['id'=>$id])->one();
            $slider->image = (string)$id.'slide.'.$model->image->extension;
            $slider->save();
            return $this->redirect(['view', 'id' => $id]);
        } else {
            return $this->render('image', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Creates a new Slider model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        //Получаем id юзера
        $idu = DostupController::getUserId();
        //Проверяем права на вход в админку
        DostupController::userDostup($idu);

        $model = new Slider();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Slider model.
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
     * Deletes an existing Slider model.
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
     * Finds the Slider model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Slider the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Slider::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
