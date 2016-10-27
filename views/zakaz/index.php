<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ZakazSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zakaz-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'sost',
            [
                /**
                 * Название поля модели
                 */
                'attribute' => 'sost',
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
                    1 => 'Новый',
                    2 => 'В работе',
                    3 => 'Выполнен',
                ],
                /**
                 * Переопределяем отображение самих данных.
                 * Вместо 1 или 0 выводим Yes или No соответственно.
                 * Попутно оборачиваем результат в span с нужным классом
                 */
                'value' => function ($model, $key, $index, $column) {
                    $active = $model->{$column->attribute};
                    if($active == 1){
                        return \yii\helpers\Html::tag(
                            'span',
                            'Новый',
                            [
                                'class' => 'label label-' . ('danger'),
                            ]
                        );
                    }
                    if($active == 2){
                        return \yii\helpers\Html::tag(
                            'span',
                            'В работе',
                            [
                                'class' => 'label label-' . ('primary'),
                            ]
                        );
                    }
                    if($active == 3){
                        return \yii\helpers\Html::tag(
                            'span',
                            'Выполнен',
                            [
                                'class' => 'label label-' . ('success'),
                            ]
                        );
                    }
                },
            ],
            'date',
            'user_id',
            'info:html',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
