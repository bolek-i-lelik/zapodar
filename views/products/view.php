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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'alias',
            'price',
            'currencyid',
            'categoryid',
            'picture',
            'pickup',
            'delivery',
            'name',
            'description:ntext',
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
