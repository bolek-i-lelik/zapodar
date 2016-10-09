<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */

$foto = stristr($model->picture, ',', true);
$fotos = explode(",", $model->picture);


?>

<?php $url = 'http://zapodar/web/';?>

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'currencyid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categoryid')->textInput(['maxlength' => true]) ?>

    <?php foreach ($fotos as $foto):?>
        <?php if($foto != ''):?>
            <?= Html::img($url.'img/products/'.$foto, ['height' => 120]) ?>
        <?php endif;?>
    <?php endforeach;?>

    <?= $form->field($model, 'pickup')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'delivery')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sales_notes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'group_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'params')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prosmotr')->textInput() ?>

    <?= $form->field($model, 'buy')->textInput() ?>

    <?= $form->field($model, 'available')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'productsid')->textInput() ?>

    <?= $form->field($model, 'vendorcode')->textInput() ?>

    <?= $form->field($model, 'vendor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

                   


</div>

