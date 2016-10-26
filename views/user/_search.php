<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'category_id') ?>

    <?= $form->field($model, 'familie') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'father') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'born') ?>

    <?php // echo $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'e_mail') ?>

    <?php // echo $form->field($model, 'tel') ?>

    <?php // echo $form->field($model, 'adress') ?>

    <?php // echo $form->field($model, 'info') ?>

    <?php // echo $form->field($model, 'password') ?>

    <?php // echo $form->field($model, 'reg_email') ?>

    <?php // echo $form->field($model, 'podpiska') ?>

    <?php // echo $form->field($model, 'auth_key') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'access_token') ?>

    <?php // echo $form->field($model, 'secret_key') ?>

    <?php // echo $form->field($model, 'date_valid_secret_key') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
