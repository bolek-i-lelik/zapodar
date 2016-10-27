<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Statistic */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Счётчики статистики', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statistic-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php if($model->pokaz == 1){$model->pokaz = 'Включен';}else{$model->pokaz = 'Выключен';} ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'text:ntext',
            'pokaz',
        ],
    ]) ?>

</div>
