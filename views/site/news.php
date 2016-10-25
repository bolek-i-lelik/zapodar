<?php
use yii\helpers\Html;

$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Новости'
]);

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'Новости'
]);

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Новости
    </p>

    <code><?= __FILE__ ?></code>
</div>