<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

$this->registerMetaTag([
    'name' => 'description',
    'content' => $article->description
]);

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $article->keywords
]);

$this->title = 'Подарки';
?>
<div class="site-index">
<link href="https://fonts.googleapis.com/css?family=Marck+Script|Rubik" rel="stylesheet"> 
    <div class="row">
        <div class="col-lg-12">
            <div id="carousel" class="carousel slide">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <?php $count_slide = 0;?>
                    <?php foreach($sliders as $slider):?>
                        <?php if($count_slide==0):?>
                            <div class="item active">
                                <img src="<?= Url::toRoute('/img/slider/'.$slider->image, true)?>" alt="<?= $slider->description ?>">
                                <div class="carousel-caption">
                                    <?= $slider->description ?>
                                </div>
                            </div>
                            <?php $count_slide = $count_slide + 1;?>
                        <?php else:?>
                            <div class="item">
                                <img src="<?= Url::toRoute('/img/slider/'.$slider->image, true)?>" alt="<?= $slider->description ?>">
                                <div class="carousel-caption">
                                    <?= $slider->description ?>
                                </div>
                            </div>
                        <?php endif;?>
                    <?php endforeach;?>
                    
                </div>
                <a class="left carousel-control" href="#carousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
    </div>
    
    <div class="index">
        <center>
            <!--<div class="col-lg-2"></div>-->
            <div name ="article" class ="col-lg-12">
                <center><p class="art zapodarTitle" ><?= $article['name'] ?></p></center>
                <p class="artDescription"> <?= $article['text'] ?></p>
                <hr/>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <a href="/search?hash=&filterid=1001&1001minvalue=0&1001maxvalue=99999&1001value1=&filterid=1000&1000minvalue=0&1000maxvalue=999999&1000value1=&1000value2=&material=кожа&color=&articul=">
                        <img src="/img/kozha.jpg">
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="/category/12182968">
                        <img src="/img/pod-upac.jpg">
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="/search?hash=&filterid=1000&1001minvalue=0&1001maxvalue=99999&1001value1=&1000minvalue=0&1000maxvalue=999999&1000value1=&1000value2=&material=дерево&color=&articul=&page=14">
                        <img src="/img/iz-dereva.jpg">
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="/site/catalog">
                        <img src="/img/suv-i-pod.jpg">
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <center>
                        <br/>
                        <a href="/search?hash=&filterid=1001&1001minvalue=0&1001maxvalue=99999&1001value1=&filterid=1000&1000minvalue=0&1000maxvalue=999999&1000value1=&1000value2=&material=кожа&color=&articul=">
                            <b>Изделия из кожи</b>
                        </a>
                    </center>
                </div>
                <div class="col-lg-3">
                    <center>
                        <br/>
                        <a href="/category/12182968">
                            <b>Подарочная упаковка</b>
                        </a>
                    </center>
                </div>
                <div class="col-lg-3">
                    <center>
                        <br/>
                        <a href="/search?hash=&filterid=1000&1001minvalue=0&1001maxvalue=99999&1001value1=&1000minvalue=0&1000maxvalue=999999&1000value1=&1000value2=&material=дерево&color=&articul=&page=14">
                            <b>Изделия из дерева</b>
                        </a>
                    </center>
                </div>
                <div class="col-lg-3">
                    <center>
                        <br/>
                        <a href="/site/catalog">
                            <b>Сувениры и подарки</b>
                        </a>
                    </center>
                </div>
            </div>
            <div class="col-lg-12 blockNews">
                    
                <div class="body-content blockNews col-lg-12">
                    <div class="col-lg-4"><br><hr></div>
                    <div class="col-lg-4">
                        <span>
                            <center>
                                <p class="zapodarTitle">Наши новости:</p>
                            </center>
                        </span>
                    </div>
                    <div class="col-lg-4"><br><hr></div>
                </div>
                <!--<div class="col-lg-2"></div>-->
                <div class="articlesNews with_imagesNews col-lg-12">
                    <?php foreach ($news as $new):?>
                        <div class="itemNews col-lg-4 col-md-4 col-sm-4 col-xs-10">
                            <center>
                                <!--<a href="/new/<?= $new->alias ?>" rel="nofollow">
                                    <span class="imageNews"><img src="/img/news/<?= $new->prev_foto ?>" alt=""></span>
                                </a>-->
                                <a href="/new/<?= $new->alias ?>">
                                    <span class="titleNews zapodarTitle" style="font-size: 20pt;"><?= $new->name ?></span>
                                </a>
                                <p class="announceNews" style="font-size: 20pt; font-family: 'Marck Script', cursive;">
                                    <?= $new->prev_text ?>
                                </p>
                            </center>
                        </div>          
                    <?php endforeach;?> 
                </div>
            </div>
        </center>
    </div>
    <script type="text/javascript">
    window.buybutt_time = '';

    function show_buy_text(obj) {
    obj.innerHTML = "<b>Купить</b>";
    obj.style = "background-color: #064727; color:#AACF9D;"
    }
    function show_buy_text_end(obj) {
    //var ss = document.getElementById(obj.id);
    //var nameNew = ss.name;
    obj.innerHTML = "<b>" + obj.name + "</b>";
    obj.style = "background-color: #FFFFFF;"
    }
</script>

<!--<div class="body-content blockNews col-lg-12">-->

</div>
<div class="body-content blockNews col-lg-12">
    <div class="col-lg-4"><br><hr></div>
    <div class="col-lg-4">
        <span>
            <center>
                <p class="zapodarTitle">Популярные товары:</p>
            </center>
        </span>
    </div>
    <div class="col-lg-4"><br><hr></div>
</div>
<div class="blockProd col-lg-12" >
    
    <?php foreach($products as $prod):?>
        <div class="progItemMain col-lg-2 col-md-3 col-sm-4 col-xs-11" style="font-syze: 14px;">
            <br/>
            <div class="prodImg">
                <a href="/product/<?= $prod['alias'] ?>" target="_self">
                    <?php if (file_exists('img/products/'.$prod['picture'])):?>                     
                        <img src="/img/products/<?= $prod['picture'] ?>" alt= "<?= $prod['name'] ?>">
                    <?php else: ?>
                        <img src="/img/products/empty_thumb.jpg" alt= "<?= $prod['name'] ?>">
                    <?php endif;?>
                </a>
            </div>
            <br/>
                
            <div><?= $prod['name'] ?></div>
            <div><br></div>
            <?php
                $pos = strpos($prod['price'], '.');
                if($pos){
                    $price = substr($prod['price'], 0, $pos+3);
                }else{
                    $price = $prod['price'];
                }
            ?>
            <div><b><?= $price?> руб.</b></div>
            <div><br></div>
            <div style="position: absolute; bottom: 10px;">
                <!--<a href="/product/<?= $prod['alias'] ?>" id="<?= $prod['id'] ?>" name="<?= $prod['price']?> руб." onmouseover="show_buy_text(this);" onmouseleave="show_buy_text_end(this);">
                    <b><?= $prod['price']?> руб.</b>
                </a>-->
                <a href="<?= Url::toRoute('/product/'.$prod['alias'], true)?>"><button class="btn btn-success" style="font-size: 16px;" >подробнее</button></a>
            </div>
        </div>
    <?php endforeach;?>

    
</div>
<!--</div>-->

<div class="col-lg-12"><p></p></div>
