<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
<div class="col-lg-10 col-lg-offset-1">
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этого пользователя?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php
        if($model->category_id == 0){$model->category->id = 'User';}else{$model->category_id = 'Admin';}
        if($model->sex == 0){$model->sex = 'мужчина';}
        if($model->sex == 1){$model->sex = 'женщина';}
        if($model->sex == 3){$model->sex = '';}
        if($model->podpiska == 0){$model->podpiska = 'На рассылку не подписан';}else{$model->podpiska = 'На рассылку подписан';}
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'category_id',
            'familie',
            'name',
            'father',
            'foto',
            'born',
            'sex',
            'e_mail',
            'tel',
            'adress',
            'info',
            'password',
            'reg_email:email',
            'podpiska',
            'auth_key',
            'created_at',
            'username',
            'access_token',
        ],
    ]) ?>

</div>
</div>
</div>
