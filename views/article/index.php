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
                        //'text:html',
                        'alias',
                        //'created_at',
                        [
                            /**
                             * Название поля модели
                             */
                            'attribute' => 'ishome',
                            /**
                             * Формат вывода.
                             * В этом случае мы отображает данные, как передали.
                             * По умолчанию все данные прогоняются через Html::encode()
                             */
                            'format' => 'raw',
                            /**
                             * Переопределяем отображение фильтра.
                             * Задаем выпадающий список с заданными значениями вместо поля для ввода
                             */
                            'filter' => [
                                0 => 'No',
                                1 => 'Yes',
                            ],
                            /**
                             * Переопределяем отображение самих данных.
                             * Вместо 1 или 0 выводим Yes или No соответственно.
                             * Попутно оборачиваем результат в span с нужным классом
                             */
                            'value' => function ($model, $key, $index, $column) {
                                $active = $model->{$column->attribute} === 1;
                                return \yii\helpers\Html::tag(
                                    'span',
                                    $active ? 'Yes' : 'No',
                                    [
                                        'class' => 'label label-' . ($active ? 'success' : 'danger'),
                                    ]
                                );
                            },
                        ],
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
