<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Продукты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->productsid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->productsid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот продукт?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php
        $fotos = $model->picture;
        $fotos = explode(",", $model->picture);
        $fotosi = '';
        foreach ($fotos as $foto) {
            $fotosi .= '<img src="/img/products/'.$foto.'" width="550"><br/>';
        }
        $model->picture = $fotosi;
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'alias',
            'price',
            'currencyid',
            'categoryid',
            'picture:html',
            'pickup',
            'delivery',
            'name',
            'description:html',
            'sales_notes',
            'group_id',
            'params',
            'prosmotr',
            'buy',
            'available',
            'productsid',
            'vendorcode',
            'vendor',
            'country',
            'edinica',
            'nalichie',
            'count',
            'podrazdelid',
            'garantie',
            'sale',
            'group_raznovid_id',
            'keywords',
        ],
    ]) ?>

</div>
