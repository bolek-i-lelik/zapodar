<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use Yii;

$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Результаты поиска'
]);

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'Результаты поиска'
]);

$this->title = 'Результат поиска';
$this->params['breadcrumbs'][] = $this->title;
Yii::$app->language = 'ru';
?>
<div class="site-search">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <?php if($tip == 1):?>
            <div class="table-responsive">
            <table class="table table-striped">
                <tr class="success">
                    <td>
                        Название
                    </td>
                    <td>
                        Фотография
                    </td>
                    <td>
                        Цена
                    </td>
                    <td>
                        Наличие
                    </td>
                    <td>
                        Скидка
                    </td>
                </tr>
            <?php foreach ($models as $model): ?>
                <tr>
                    <td>
                        <a href="<?= Url::toRoute('/product/'.$model->alias, true)?>"><?= $model->name ?></a>
                    </td>
                    <td>
                        <?php if($model->picture):?>
                        <img src="/img/products/<?= stristr($model->picture, ',', true) ?>" height="150">
                        <?php else:?>
                            нет фото
                        <?php endif;?>
                    </td>
                    <td>
                        <?= $model->price ?>
                    </td>
                    <td>
                        <?php if($model->nalichie == '+'):?>
                            В наличии
                        <?php else:?>
                            Нет в наличии
                        <?php endif;?>
                    </td>
                    <td>
                        <?= $model->sale ?>
                    </td>
                </tr>
            <?php endforeach ?>
            </table>
            </div>
        <?php endif;?>
        <?php if($tip == 2):?>
            <div class="row">
                <?php foreach ($models as $model):?>
                    <div class="col-lg-3">
                        <center>
                            <a href="<?= Url::toRoute('/category/'.$model->id, true)?>">
                                <?= $model->name ?>
                            </a>
                        </center>
                    </div>
                <?php endforeach;?>
            </div>
        <?php endif;?>
    </div>
    <center>
        <?php echo LinkPager::widget([
            'pagination' => $results,
        ]);?>
    </center>
</div>