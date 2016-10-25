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
            <div class="progItem col-lg-3">
                <div style="height: 350px;">
                <br/>
                <center><img src="/img/products/<?= $result->picture ?>" height="150">
                <h3><?= Html::a($result->name, ['category/'.$result->id]) ?></h3></center>
                </div>
            </div>
        <?php endforeach;?>
    <?php endif;?>
    <?php if($tip == 2): ?>
        <?php foreach($models as $model):?>
            <div class="progItem col-lg-3">
                <div style="height: 350px;">
                <br/>
                <?php $foto = stristr($model->picture, ',', true);?>
                <?php $fotos = explode(",", $model->picture);?>
                <?php if(!empty($fotos[0])):?>
                <center><img src="/img/products/<?= $fotos[0] ?>" height="150">
                <?php endif;?>
                <?php if(empty($fotos[0])):?>
                    <center><img src="/img/products/empty_thumb.jpg" height="100">
                <?php endif;?>
                <p><?= $model->name ?></p>
                <p><?= $model->price ?> руб.</p>
                <a href="<?= Url::toRoute('/product/'.$model->alias, true)?>"><button class="btn btn-success">подробнее</button></a></center>
                
                </div>
            </div>
        <?php endforeach;?>
    <?php endif;?>
    </div>
    <center>
<?php if($tip == 2): ?>    
<?php echo LinkPager::widget([
    'pagination' => $results,
]);?>
<?php endif;?>
</center>



    
</div>