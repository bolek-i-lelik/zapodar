<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Slider;
use yii\web\View;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Slider */

$this->title = $model->description;
$this->params['breadcrumbs'][] = ['label' => 'Слайдер', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

//проверка наличия фото

?>
<div class="slider-view">

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

   

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'description',
            //'image',
            'link',
        ],
        
    ]) ?>
    <img src="<?= Url::toRoute('/img/slider/'.$model->image, true)?>" width="700">
</div>
