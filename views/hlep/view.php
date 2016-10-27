<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Hlep */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Вопрос-Ответ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hlep-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактиривать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php if($model->pokaz == 1){$model->pokaz = 'Опубликовано';}else{$model->pokaz = 'Не опубликовано';} ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'vopros:html',
            'otvet:html',
            'pokaz',
        ],
    ]) ?>

</div>
