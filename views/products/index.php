<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продукция';
$this->params['breadcrumbs'][] = $this->title;
?>
<aside class="right-side">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="products-index">

                <h1><?= Html::encode($this->title) ?></h1>

                <p>
                    <?= Html::a('Добавить продукт', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

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
                        // 'prosmotr',
                        // 'buy',
                        // 'available',
                         'productsid',
                        // 'vendorcode',
                        // 'vendor',
                        // 'country',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</aside>
