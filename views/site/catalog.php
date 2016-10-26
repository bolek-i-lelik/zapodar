<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Каталог';
$this->params['breadcrumbs'][] = $this->title;
?>


<center><h1><?= Html::encode($this->title) ?></h1></center>
<div class="row">
        
        <?php foreach($category as $cat):?>
            <div class="progItem col-lg-3">
                <div><p></p></div>
                <div><p></p></div>
                <div class="prodImg">
                    <center><img src="/img/products/<?= $cat->picture ?>" height="80">
                    </center>
                </div>
                <div><p></p></div>
                <div style="text-align: center;"><p class="zapodarCatalog"><?= Html::a($cat->name, ['category/'.$cat->id]) ?></p></div>

                
                
            </div>
        <?php endforeach;?>
<div class="col-lg-12"><p></p></div>
<div class="col-lg-12"><p></p></div>
        
</div>