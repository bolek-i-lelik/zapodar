<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Продукция', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$url = 'http://zapodar/web/';
?>
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="products-view" style="width: 100%;">

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
                <?php $foto = stristr($model->picture, ',', true);?>
                <?php $fotos = explode(",", $model->picture);?>
                <?php foreach ($fotos as $foto):?>
                    <?php if($foto != ''):?>
                        <?= Html::img($url.'img/products/'.$foto, ['height' => 120]) ?>
                    <?php endif;?>
                <?php endforeach;?>
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'alias',
                        'price',
                        'currencyid',
                        'categoryid',
                        //'picture',
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
                    ],
                ]) ?>

            </div>
        </div>
    </div>
