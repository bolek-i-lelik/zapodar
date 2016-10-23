<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;

//var_dump($model);
?>

<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if(Yii::$app->session->hasflash('success')):?>

        <?= Yii::$app->session->getFlash('success')?>
        <?= Yii::$app->session->getFlash('error')?>

    <?php endif;?>

    <p>Пожалуйста введите информацию:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'reg-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'familie') ?>

        <?= $form->field($model, 'name')?>

        <?= $form->field($model, 'father') ?>

        <?= $form->field($model, 'e_mail') ?>

        <?= $form->field($model, 'tel') ?>

        <?= $form->field($model, 'adress') ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'password2')->passwordInput() ?>

        <?= $form->field($model, 'podpiska')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>

        <?= $form->field($model, 'verifyCode')->widget(Captcha::className()) ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

    
</div>