<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Материалы';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="articles-index">

                <h1><?= Html::encode($this->title) ?></h1>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                <p>
                    <?= Html::a('Добавить материал', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'id',
                        'name',
                        'title',
                        'description',
                        'keywords',
                        'text',
                        'alias',
                        'created_at',
                        'ishome',
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
