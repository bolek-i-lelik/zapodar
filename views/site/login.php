<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
    <div class="row">
    <div class="col-lg-6">
    <p>Пожалуйста введите Ваш логин и пароль:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-6\">{input}</div>\n<div class=\"col-lg-4\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-8\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-8">
                <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
    </div>
    <div class="col-lg-1 visible-lg">
    <div style="width: 1px; height: 300px; background-color: #064727;"></div>
    </div>
    <div class="col-lg-1 hidden-lg">
    <hr>
    </div>
    <div class="col-lg-5">
        <p>Если Вы ещё не зарегистрированы на нашем сайте, то мы рады приветствовать Вас и предлагаем зарегистрироваться.</p>
        <a href="<?= Url::toRoute('/reg', true)?>"><button class="btn btn-primary">Зарегистрироваться</button></a>
        <hr>
        <p>Если Вы по какой-либо причине забыли свой пароль - не огорчайтесь Вы можете восстановить пароль прямо сейчас.</p>
        <a href="<?= Url::toRoute('/newparol', true)?>"><button class="btn btn-success">Восстановить пароль</button></a>
    </div>
    </div>
    </div>

</div>
