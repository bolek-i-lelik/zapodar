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
    <div class="row">

        <?php if($tip == 1): ?>
            <?php foreach($results as $result):?>
                <div class="progItem col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div style="height: 350px;">
                        <br/>
                        <center><img src="/img/products/<?= $result->picture ?>" height="150"></center>
                    </div>
                    <div style="height: 350px;"><center><h3><?= Html::a($result->name, ['category/'.$result->id]) ?></h3></center>
                    </div>
                </div>
            <?php endforeach;?>
        <?php endif;?>
        <?php if($tip == 2): ?>
            <?php foreach($models as $model):?>
                <div class="progItem col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class = "col-lg-12" style="position:relative;">
                        <br>
                        <?php $foto = stristr($model->picture, ',', true);?>
                        <?php $fotos = explode(",", $model->picture);?>
                        <?php if(!empty($fotos[0])):?>
                            <center>
                                <?php if (file_exists('img/products/'.$fotos[0])):?>
                                    <img src="/img/products/<?= $fotos[0] ?>" alt= "<?= $model->name ?>" height="150"; width="200">
                                <?php else: ?>
                                    <img src="/img/products/empty_thumb.jpg" alt= "<?= $model->name ?>">
                                <?php endif;?>
                                
                            </center>
                        <?php endif;?>
                        <?php if(empty($fotos[0])):?>
                            <center><img src="/img/products/empty_thumb.jpg" height="150"></center>
                        <?php endif;?>
                    </div>
                    <div class = "col-lg-12"><?= $model->name ?><br><br></div>
                    <div class = "col-lg-12"><b><?= $model->price ?> руб.</b></div>
                    <div class = "col-lg-12" style="position: absolute; bottom: 35px;"><a href="<?= Url::toRoute('/product/'.$model->alias, true)?>"><button class="btn btn-success" style="font-size: 16px;" >подробнее</button></a></center></div>
                    
                    
                </div>
            <?php endforeach;?>
        <?php endif;?>
    </div>
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