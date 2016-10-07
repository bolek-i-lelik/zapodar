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
<div class="">

    <form id="w0" action="/products/create" method="post">
<input type="hidden" name="_csrf" value="QXRHa0pLMWQzACZSBz9eDiM2Jh84JH0dMCELMnN6YzsOEnMxBnN4EQ==">
    <div class="form-group field-products-id">
<label class="control-label" for="products-id">ID</label>
<input type="text" id="products-id" class="form-control" name="Products[id]" maxlength="255">

<div class="help-block"></div>
</div>
    <div class="form-group field-products-alias">
<label class="control-label" for="products-alias">Alias</label>
<input type="text" id="products-alias" class="form-control" name="Products[alias]" maxlength="255">

<div class="help-block"></div>
</div>
    <div class="form-group field-products-price">
<label class="control-label" for="products-price">Цена</label>
<input type="text" id="products-price" class="form-control" name="Products[price]" maxlength="255">

<div class="help-block"></div>
</div>
    <div class="form-group field-products-currencyid">
<label class="control-label" for="products-currencyid">Currencyid</label>
<input type="text" id="products-currencyid" class="form-control" name="Products[currencyid]" maxlength="255">

<div class="help-block"></div>
</div>
    <div class="form-group field-products-categoryid">
<label class="control-label" for="products-categoryid">Categoryid</label>
<input type="text" id="products-categoryid" class="form-control" name="Products[categoryid]" maxlength="255">

<div class="help-block"></div>
</div>
    <!--<div class="form-group field-products-picture">
<label class="control-label" for="products-picture">Фотографии</label>
<input type="text" id="products-picture" class="form-control" name="Products[picture]" maxlength="1000">

<div class="help-block"></div>
</div>-->
                
    <div class="form-group field-products-pickup">
<label class="control-label" for="products-pickup">Pickup</label>
<input type="text" id="products-pickup" class="form-control" name="Products[pickup]">

<div class="help-block"></div>
</div>
    <div class="form-group field-products-delivery">
<label class="control-label" for="products-delivery">Delivery</label>
<input type="text" id="products-delivery" class="form-control" name="Products[delivery]">

<div class="help-block"></div>
</div>
    <div class="form-group field-products-name">
<label class="control-label" for="products-name">Заголовок</label>
<input type="text" id="products-name" class="form-control" name="Products[name]" maxlength="255">

<div class="help-block"></div>
</div>
    <div class="form-group field-products-description">
<label class="control-label" for="products-description">Описание</label>
<textarea id="products-description" class="form-control" name="Products[description]" rows="6"></textarea>

<div class="help-block"></div>
</div>
    <div class="form-group field-products-sales_notes">
<label class="control-label" for="products-sales_notes">Sales Notes</label>
<input type="text" id="products-sales_notes" class="form-control" name="Products[sales_notes]" maxlength="255">

<div class="help-block"></div>
</div>
    <div class="form-group field-products-group_id">
<label class="control-label" for="products-group_id">Group ID</label>
<input type="text" id="products-group_id" class="form-control" name="Products[group_id]" maxlength="255">

<div class="help-block"></div>
</div>
    <div class="form-group field-products-params">
<label class="control-label" for="products-params">Параметры</label>
<input type="text" id="products-params" class="form-control" name="Products[params]" maxlength="1500">

<div class="help-block"></div>
</div>
    <div class="form-group field-products-prosmotr">
<label class="control-label" for="products-prosmotr">Кол-во просмотров</label>
<input type="text" id="products-prosmotr" class="form-control" name="Products[prosmotr]">

<div class="help-block"></div>
</div>
    <div class="form-group field-products-buy">
<label class="control-label" for="products-buy">Количество покупок</label>
<input type="text" id="products-buy" class="form-control" name="Products[buy]">

<div class="help-block"></div>
</div>
    <div class="form-group field-products-available required">
<label class="control-label" for="products-available">Активно</label>
<input type="text" id="products-available" class="form-control" name="Products[available]" maxlength="255">

<div class="help-block"></div>
</div>
    <div class="form-group field-products-productsid required">
<label class="control-label" for="products-productsid">Productsid</label>
<input type="text" id="products-productsid" class="form-control" name="Products[productsid]">

<div class="help-block"></div>
</div>
    <div class="form-group field-products-vendorcode">
<label class="control-label" for="products-vendorcode">Vendorcode</label>
<input type="text" id="products-vendorcode" class="form-control" name="Products[vendorcode]">

<div class="help-block"></div>
</div>
    <div class="form-group field-products-vendor">
<label class="control-label" for="products-vendor">Производитель/Продавец</label>
<input type="text" id="products-vendor" class="form-control" name="Products[vendor]" maxlength="255">

<div class="help-block"></div>
</div>
    <div class="form-group field-products-country">
<label class="control-label" for="products-country">Страна производитель</label>
<input type="text" id="products-country" class="form-control" name="Products[country]" maxlength="255">

<div class="help-block"></div>
</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    </form>

</div>

