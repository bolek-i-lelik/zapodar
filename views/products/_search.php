<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'alias') ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'currencyid') ?>

    <?= $form->field($model, 'categoryid') ?>

    <?php // echo $form->field($model, 'picture') ?>

    <?php // echo $form->field($model, 'pickup') ?>

    <?php // echo $form->field($model, 'delivery') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'sales_notes') ?>

    <?php // echo $form->field($model, 'group_id') ?>

    <?php // echo $form->field($model, 'params') ?>

    <?php // echo $form->field($model, 'prosmotr') ?>

    <?php // echo $form->field($model, 'buy') ?>

    <?php // echo $form->field($model, 'available') ?>

    <?php // echo $form->field($model, 'productsid') ?>

    <?php // echo $form->field($model, 'vendorcode') ?>

    <?php // echo $form->field($model, 'vendor') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'edinica') ?>

    <?php // echo $form->field($model, 'nalichie') ?>

    <?php // echo $form->field($model, 'count') ?>

    <?php // echo $form->field($model, 'podrazdelid') ?>

    <?php // echo $form->field($model, 'garantie') ?>

    <?php // echo $form->field($model, 'sale') ?>

    <?php // echo $form->field($model, 'group_raznovid_id') ?>

    <?php // echo $form->field($model, 'keywords') ?>

    <div class="form-group">
        <?= Html::submitButton('Искать', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сбросить', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
