<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = $new->title;
//$this->description = $new->description;
//$this->keywords = $new->keywords;
$this->params['breadcrumbs'][] = $new->name;
Yii::$app->language = 'ru';
?>
<div class="row">
	<div class="col-lg-10 col-lg-offset-1">
        <h1><?= $new->name ?></h1>
        <?= $new->text ?>
    </div>
</div>