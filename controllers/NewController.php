<?php

namespace app\controllers;

use app\models\News;
use yii\data\Pagination;
use Yii;

class NewController extends \yii\web\Controller
{
    public function actionIndex()
    {

        $query = News::find()->orderBy('created_at DESC');
        
        $count = News::find()->count();

        $results = new Pagination(['totalCount' => $count, 'pageSize' => $count]);

        $results->pageSizeParam = false;

        $models = $query->offset($results->offset)
            ->limit($results->limit)
            ->all();

        return $this->render('index', [
            'models' => $models,
            'results' => $results,
            
        ]);
    }

    public function actionOnenew()
    {

    	$request = Yii::$app->request;

        $alias = $request->get('alias');

        $new = News::find()->where(['alias' => $alias])->one();

        //$new->prosmotr = $new->prosmotr + 1;
        //$new->save();

        return $this->render('onenew',[
        	'new' => $new,
        ]);

    }

    public function populationNews()
    {
    	$news = News::find('alias', 'prev_text', 'prev_foto', 'created_at', 'name')->orderBy('created_at asc')->limit(3)->all();

    	return $news;
    }
}
