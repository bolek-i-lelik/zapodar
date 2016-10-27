<?php

namespace app\controllers;

use Yii;
use app\models\Zakaz;
use app\models\ZakazSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Basket;
use app\models\User;
use app\models\Products;

/**
 * ZakazController implements the CRUD actions for Zakaz model.
 */
class ZakazController extends Controller
{
        public $layout = 'admin';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Zakaz models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ZakazSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Zakaz model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $zakaz = Zakaz::find()->where(['id'=>$id])->one();

        $user = User::find()->where(['id'=>$zakaz->user_id])->one();

        $product_in_zakaz = Basket::find()->where(['zakaz_id'=>$id])->all();
        $products = array();
        foreach ($product_in_zakaz as $prod) {
            $product = Products::find()->where(['productsid'=>$prod->product_id])->one();
            $zakaz_prod_id = Basket::find()->where(['product_id'=>$prod->product_id])->andWhere(['zakaz_id'=>$id])->one();
            $pr = array();
            $pr[$zakaz_prod_id->count] = $product;
            $products[] = $pr;
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
            'zakaz' => $zakaz,
            'user' => $user,
            'product_in_zakaz' => $product_in_zakaz,
            'products' => $products,
        ]);
    }

    /**
     * Creates a new Zakaz model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Zakaz();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Zakaz model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->sost = $model->sost + 2;
            if($model->save()){

                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Zakaz model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Zakaz model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Zakaz the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Zakaz::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
