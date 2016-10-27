<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Hlep */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hlep-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vopros')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную   возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]); ?>

    <?= $form->field($model, 'otvet')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную   возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]); ?>

    <?= $form->field($model, 'pokaz')->dropdownList(['Снять с публикации', 'Опубликовать'],
    ['prompt'=>'']
    ); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
