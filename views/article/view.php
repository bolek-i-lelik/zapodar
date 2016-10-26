<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Articles */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Материалы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="articles-view">

                <h1><?= Html::encode($this->title) ?></h1>

                <p>
                    <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Вы уверены, что хотите удалить этот материал?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>
                <?php
                    $model->text = '<div class="col-lg10">'.$model->text.'</div>';
                ?>
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'name',
                        'title',
                        'description',
                        'keywords',
                        'alias',
                        'created_at',
                        'text:html',
                        'ishome',
                    ],
                ]) ?>

            </div>
        </div>
    </div>
