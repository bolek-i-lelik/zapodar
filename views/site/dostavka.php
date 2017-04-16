<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->registerMetaTag([
    'name' => 'description',
    'content' => $article['description']
]);

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $article['keywords']
]);

$this->title = 'Доставка';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">

    <h1><?= Html::encode($this->title) ?></h1>

    

        <p>
            <?= $article['text'] ?>
        </p>

        

    
</div>