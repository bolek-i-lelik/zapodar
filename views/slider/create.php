<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\UploadImage;
use yii\web\UploadedFile;

/* @var $this yii\web\View */
/* @var $model app\models\Slider */

$this->title = 'Добавить слайд';
$this->params['breadcrumbs'][] = ['label' => 'Слайдер', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$modelimage = new UploadImage();

if (Yii::$app->request->isPost) {
    $modelimage->image = UploadedFile::getInstance($modelimage, 'image');
    if ($modelimage->upload()) {
        // file is uploaded successfully
        return;
    }
}

?>
<div class="slider-create">

    <h1><?= Html::encode($this->title) ?></h1>
    		<?= $this->render('_form', [
        		'model' => $model,
    		]) ?>
  	
</div>
