<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\models\News */
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
<div class="col-lg-10 col-lg-offset-1">
<div class="news-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить эту новость?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php 
        $model->prev_foto = '<img src ="/img/news/'.$model->prev_foto.'" height="250">';
        //if($model->pokaz == 1){$model->pokaz = 'Опубликовано';}else{$model->pokaz = 'не опубликовано';}
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'name',
            'description',
            'keywords',
            'text:html',
            'prev_text:html',
            'created_at',
            'prosmotr',
            'prev_foto:html',
            'alias',
        ],
    ]) ?>

</div>
</div>
</div>
