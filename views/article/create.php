<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Articles */

$this->title = 'Добавить материал';
$this->params['breadcrumbs'][] = ['label' => 'Материалы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1">
			<div class="articles-create">

    			<h1><?= Html::encode($this->title) ?></h1>

    			<?= $this->render('_form', [
        			'model' => $model,
    			]) ?>

			</div>
		</div>
	</div>
