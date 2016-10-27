<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Счётчики статистики';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statistic-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить счётчик', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'text:ntext',
            [
                /**
                 * Название поля модели
                 */
                'attribute' => 'pokaz',
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
                    0 => 'Нет',
                    1 => 'Да',
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
                        $active ? 'Да' : 'Нет',
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
