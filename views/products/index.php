<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продукты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить продукт', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'alias',
            'price',
            'currencyid',
            'categoryid',
            // 'picture',
            // 'pickup',
            // 'delivery',
             'name',
            // 'description:ntext',
            // 'sales_notes',
            // 'group_id',
            // 'params',
             'prosmotr',
             'buy',
            // 'available',
            // 'productsid',
            // 'vendorcode',
            // 'vendor',
            // 'country',
            // 'edinica',
            'nalichie',
            // 'count',
            // 'podrazdelid',
            // 'garantie',
             'sale',
            // 'group_raznovid_id',
            // 'keywords',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
