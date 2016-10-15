<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
Yii::$app->language = 'ru';
?>
<div class="row">
	<?php foreach($models as $model):?>
        <div class="col-lg-10 col-lg-offset-1">
        	<div class="row">
        		<div class="col-lg-5">
        			<img src="/img/news/<?= $model->prev_foto ?>">
        		</div>
        		<div class="col-lg-7">
        			<p><?= $model->name ?></p>
        			<p><?= $model->prev_text ?></p>
        			<p>Добавлено: <?= $model->created_at ?></p>
        			<a href="/new/<?=$model->alias?>"><button class="btn btn-success">подробнее</button></a>
        		</div>
        	</div>
        	<hr>
        </div>
    <?php endforeach;?>
    <?php echo LinkPager::widget([
    'pagination' => $results,
]);?>
</div>



