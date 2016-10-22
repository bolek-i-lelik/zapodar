<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

$this->title = 'Подарки';
?>
<div class="site-index">

    <div style="margin-left: 0; margin-right: 0; background-color: #fff; border-width: 1px; border-color: #ddd; border-radius: 4px 4px 0 0; box-shadow: none; width:650px;transform: translate(35%,0%);">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img src="<?= Url::toRoute('/img/eje.jpg', true)?>" alt="First slide">
                </div>
                <div class="item">
                    <img src="<?= Url::toRoute('/img/pap.jpg', true)?>" alt="First slide">
                </div>
                <div class="item">
                    <img src="<?= Url::toRoute('/img/nab.jpg', true)?>" alt="First slide">
                </div>
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>
    <div class="index">
        <div name ="article" class ="col-lg-12">
            <center><p class="art"><?= $article['name'] ?></p></center>
                <p class="artDescription"> <?= $article['description'] ?></p>

        </div>

        <div class="body-content blockNews">
            <div class="body-content blockNews col-lg-12">
                <div class="borderNews col-lg-4"></div>
                <div class="col-lg-4">
                    <span>
                        <center>
                            <b style="font: 18px Georgia;">Наши новости:</b>
                        </center>
                    </span>
                </div>
                <div class="borderNews col-lg-4"></div>
            </div>
            <div class="articlesNews with_imagesNews">
                <?php foreach ($news as $new):?>
                <div class="itemNews col-lg-4">
                <center>
                    <a href="/new/<?= $new->alias ?>" rel="nofollow">
                        <span class="imageNews"><img src="/img/news/<?= $new->prev_foto ?>" alt=""></span>
                    </a>
                    <a href="/new/<?= $new->alias ?>">
                        <span class="titleNews"><?= $new->name ?></span>
                    </a>
                    <p class="announceNews">
                            <?= $new->prev_text ?>
                    </p>
                    </center>
                </div>          
                <?php endforeach;?> 
            </div>
        </div>
    </div>
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
    <div class="body-content blockNews col-lg-12">
        <div class="borderNews col-lg-4"></div>
        <div class="col-lg-4">
            <span>
                <center>
                    <b style="font: 18px Georgia;">Популярные товары:</b>
                </center>
            </span>
        </div>
        <div class="borderNews col-lg-4"></div>
    </div>
    <center>
    <div class="blockProd row">
        <center>
        <?php foreach($products as $prod):?>
            <div class="progItem col-lg-1-5"  >
                <br/>
                <div class="prodImg">
                    <a href="/product/<?= $prod['alias'] ?>" target="_self">
                        <img src="/img/products/<?= $prod['picture'] ?>" alt="<?= $prod['name'] ?>" height="150">
                    </a>
                </div>
                <br/>
                
                <div><a href="/product/<?= $prod['alias'] ?>" target="_self"><?= $prod['name'] ?></a></div>
                <div><br></div>
                <div class="cach">
                    <a href="//" id="<?= $prod['id'] ?>" name="<?= $prod['price']?> руб." onmouseover="show_buy_text(this);" onmouseleave="show_buy_text_end(this);">
                        <b><?= $prod['price']?> руб.</b>
                    </a>
                </div>
            </div>
        <?php endforeach;?>
        </center>
        
    </div>
    </center>
<!--</div>-->


