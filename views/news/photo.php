<?php
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>

<img src="<?= Url::toRoute('/img/news/'.$picture, true)?>" height="300">
<br/>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'imageFile')->fileInput()->label('Изображение') ?>

    <button>Загрузить</button>

<?php ActiveForm::end() ?>