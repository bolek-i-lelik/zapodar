<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use Yii;

$this->registerMetaTag([
    'name' => 'description',
    'content' => $cat_name->name
]);

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $cat_name->name
]);

//var_dump($bread);exit();
$this->title = $cat_name->name;
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['/catalog']];
foreach ($bread as $value) {
    if($value != NULL){
     $this->params['breadcrumbs'][] = ['label' => $value['name'], 'url' => ['/category/'.$value['id']]];
    }
}
$this->params['breadcrumbs'][] = $this->title;
Yii::$app->language = 'ru';
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <hr/>
    <div class="row">
        <div class="col-lg-5">
            <center>
                <img src="/img/banner_gallery_pack.jpg">
            </center>
        </div>
        <div class="col-lg-7">
            <center>
                <br/><br/><br/>
                <p>Вы можете выбрать любую понравившуюся Вам упаковку в нашей галерее. Мы с радостью подготовим похожую, в соответствии с Вашими пожеланиями.</p>
                <a href="/site/gallery" class="btn btn-success" type="button">Перейти в галерею</a>
            </center>
        </div>
    </div>    
    <hr/>
    <div class="row">

        <?php if($tip == 1): ?>
            <?php foreach($results as $result):?>
                <div class="progItem col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div style="height: 180px;">
                        <br/>
                        <center><a href="/category/<?= $result->id ?>"><img src="/img/products/<?= $result->picture ?>" height="150"></a></center>
                    </div>
                    <div style="height: 150px;"><center><h3><?= Html::a($result->name, ['category/'.$result->id]) ?></h3></center>
                    </div>
                </div>
            <?php endforeach;?>
        <?php endif;?>
        <?php if($tip == 2): ?>
            <?php foreach($models as $model):?>
                <div class="progItem col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div style="height: 180px;">
                        <br/>
                        <center><a href="<?= Url::toRoute('/product/'.$model->alias, true)?>"><img src="/img/products/<?= $model->picture ?>" height="150"></a></center>
                    </div>
                    <div style="height: 100px;"><center>
                        <?php $name = substr($model->name, 0, 80);  ?>
                        <?= $name ?><br><br>
                        <?php
                            $pos = strpos($model->price, '.');
                            if($pos){
                                $price = substr($model->price, 0, $pos+3);
                            }else{
                                $price = $model->price;
                            }
                        ?>
                        Артикул: <?= $model->vendorcode ?><br/>
                        <b><?= $price ?> руб.</b>
                        </center>
                    </div>
                    <div style="height: 50px;">
                        <center>
                            <a href="<?= Url::toRoute('/product/'.$model->alias, true)?>">
                                <button class="btn btn-success" style="font-size: 16px;" >подробнее</button><br>
                            </a><br>
                        </center>
                    </div>
                </div>
            <?php endforeach;?>
        <?php endif;?>
    </div>
    <br>
    <center>
        <?php if($tip == 2): ?>    
            <?php echo LinkPager::widget([
                'pagination' => $results,
            ]);?>
        <?php else: ?>
            <div class = "col-lg-12" style="height:20px;"></div>
        <?php endif;?>
    </center>



    
</div>