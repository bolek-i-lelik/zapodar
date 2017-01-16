<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Каталог';
$this->params['breadcrumbs'][] = $this->title;
?>


<center><h1><?= Html::encode($this->title) ?></h1></center>
<div class="row">
        
        <?php foreach($category as $cat):?>
            <div class="progItem col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div><p></p></div>
                <div><p></p></div>
                <div class="prodImg">
                    <center><a href="/category/<?= $cat->id ?>"><img src="/img/products/<?= $cat->picture ?>" height="80"></a>
                    </center>
                </div>
                <div><p></p></div>
                <div style="text-align: center;"><p class="zapodarCatalog"><?= Html::a($cat->name, ['category/'.$cat->id]) ?></p></div>

                
                
            </div>
        <?php endforeach;?>
<div class="col-lg-12"><p></p></div>
<div class="col-lg-12"><p></p></div>
        
</div>