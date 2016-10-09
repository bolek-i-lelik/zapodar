<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Articles */

$this->title = 'Редактировать материал: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Материалы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1">
			<div class="articles-update">

    			<h1><?= Html::encode($this->title) ?></h1>

    			<?= $this->render('_form', [
        			'model' => $model,
    			]) ?>

			</div>
		</div>
	</div>
