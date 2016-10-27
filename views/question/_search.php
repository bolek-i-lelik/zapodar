<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\QuestionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="questionadmin-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'familie') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'father') ?>

    <?= $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'adress') ?>

    <?php // echo $form->field($model, 'company') ?>

    <?php // echo $form->field($model, 'dolgnost') ?>

    <?php // echo $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php  echo $form->field($model, 'sost') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
