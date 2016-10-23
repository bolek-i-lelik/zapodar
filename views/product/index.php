<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $product->name;
$this->params['breadcrumbs'][] = $this->title;
Yii::$app->language = 'ru';

$foto = stristr($product->picture, ',', true);
$fotos = explode(",", $product->picture);

?>
<div class="product">
    <div class="row">
        <div class="col-lg-1">
            <center>
                <?php if(isset($fotos[1])):?>
                            <img src="/img/products/<?= $fotos[0] ?>" alt="" height="50" onclick = "f_zoom(src);"><br><br>
                    <?php foreach ($fotos as $key => $value): ?>
                        <?php if($key>0 && $value != ''): ?>
                            <img src="/img/products/<?= $value ?>" alt="" height="50" onclick = "f_zoom(src);"><br><br>
                        <?php endif;?>  
                    <?php endforeach ?>
                <?php endif;?>
                </center>
        </div>
    	<div class="col-lg-6">
            <div class="mainPic">
    		  <img id="mainPic" style="max-height: 600px;" src="/img/products/<?= $fotos[0] ?>" height="50" alt="" class="img-thumbnail"><br/><br/>
            </div>
            <div>
        		
            </div>
    	</div>
    	<div class="col-lg-5">
    		<p><?= $product->vendorcode ?></p>
                
    		<p class="zapodarTitle"><?= Html::encode($this->title) ?></p>
    		<p><?= $product->price?> рублей</p>
                <p class="row">
                    <?= $product->description ?>
                </p>
            <?php if($guest == FALSE):?>
                <?php if($onbasket == FALSE):?>
                    <div id="basket">
                        <button class="btn btn-success" onclick="putInCorzina(<?= $product->productsid ?>, <?= Yii::$app->user->id ?>)">В корзину</button>
                    </div>
                <?php else:?>
                    <p>В корзине</p>
                <?php endif;?>
            <?php else:?>
                <p>Войдите или зарегистрируйтесь, чтобы положить в корзину</p>
            <?php endif;?>
    	</div>
    </div>

    <div id="korzina"></div>
</div>

