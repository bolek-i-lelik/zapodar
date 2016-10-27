<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Question */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Вопросы из корзины', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-view">

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
    <?php if($model->sost == NULL){$model->sost = 'Новое';}?>
    <?php if($model->sost == 1){$model->sost = 'Отработано';}?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'familie',
            'name',
            'father',
            'email:email',
            'adress',
            'company',
            'dolgnost',
            'text:ntext',
            'date',
            'sost',
        ],
    ]) ?>

</div>
