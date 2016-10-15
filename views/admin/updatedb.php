<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

Yii::$app->language = 'ru';
?>

<div class="row">
	<div class="col-lg-10 col-lg-offset-1">
		<div class="alert alert-success">
			Создано новых продуктов: <?= $np ?>
		</div>
		<div class="alert alert-info">
			Обновлена информация о <?= $up ?> продуктов
		</div>
		<div class="alert alert-warning">
			Всего: <?= $highestRow ?> продуктов
		</div>
	</div>
</div>
<a href="<?= Url::toRoute('/admin/upload', true)?>"><button class="btn btn-success">Загрузить/Обновить</button></a>