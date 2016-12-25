<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use app\controllers\Layouts;
use app\widgets\menu\MainMenu;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= yii\helpers\Html::csrfMetaTags() ?>
    <title><?= yii\helpers\Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style type="text/css">

        #page-preloader {
        position: fixed;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        background: #fff;
        z-index: 100500;
        }

        #page-preloader .spinner {
        width: 150px;
        height: 150px;
        position: absolute;
        left: 50%;
        top: 50%;
        background: url('lin.gif') no-repeat 50% 50%;
        margin: -16px 0 0 -16px;
        }

        
    </style>
</head>
<body>

<?php $this->beginBody() ?>
    <div id="page-preloader"><span class="spinner" id="spinner"></span></div>
    <div id="all">
        <div id="header">
            <div id="logo"><a href="/"><img border="0" src="/images/logo_new.png" width="250"/></a></div>       
            <div id="ofic">
                <center>
                    Торговая компания «Русский Бизнес»<br/> 
                    Официальный представитель<br/>
                    <span size="2">TM GRASARO &nbsp; TM KERRANOVA </span><br/>
                    TM FORMAN TM HOTROCK
                </center>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
            </div>
            <div id="add_header">
                <p>г.Москва, ул.Миклухо-Маклая, вл.8, стр.3,офис 105<br /> 
                E-mail: <a href="mailto:forman-99@mail.ru">forman-99@mail.ru</a></p>
            </div>      
            <div id="right_h">
                <div id="tell_head">
                    <span style="font-size: 13pt;">+7 (495) 781-20-70</span><br/>
                    <span style="font-size: 13pt;">+7 (495) 781-70-30</span><br/>
                    <span style="font-size: 13pt;">+7 (916) 971-76-67</span><br/>
                    <span style="font-size: 17.3333339691162px;">+7 (926) 268-75-21</span><br/>
                </div>
                <div id="perezvon">
                    <a href="/" class="mform">Мы вам перезвоним</a>
                </div>
                <div id="poisk">
                    <form action="http://rb-forman.ru/"  method="post" class="searchpoisk">
                        <label for="mod_search_searchword">
                            Поиск
                        </label>
                        <input name="searchword" id="mod_search_searchword" maxlength="20" class="inputboxpoisk" type="text" size="20" value="поиск..."  onblur="if(this.value=='') this.value='поиск...';" onfocus="if(this.value=='поиск...') this.value='';" /><input type="submit" value="" class="buttonpoisk"/>   <input type="hidden" name="option" value="com_search" />
                        <input type="hidden" name="task"   value="search" />
                        <input type="hidden" name="Itemid" value="1" />
                    </form>
                </div>          
            </div>
            <div id="main_menu">
                <ul class="menu" id="main_m">
                    <li id="current" class="item1">
                        <a href="<?= yii\helpers\Url::to('/', true);?>"><span>Главная</span></a>
                    </li>
                    <li class="item2">
                        <a href="<?= yii\helpers\Url::to('/about', true); ?>"><span> О компании</span></a>
                    </li>
                    <li class="item5">
                        <a href="<?= yii\helpers\Url::to('/articles', true) ?>"><span>Статьи</span></a>
                    </li>
                    <li class="item26">
                        <a href="<?= yii\helpers\Url::to('/dostavka', true) ?>"><span>Доставка</span></a>
                    </li>
                    <li class="item28">
                        <a href="<?= yii\helpers\Url::to('akcii', true) ?>"><span>Акции</span></a>
                    </li>
                    <li class="item3">
                        <a href="<?= yii\helpers\Url::to('/contact', true); ?>"><span>Контакты</span></a>
                    </li>
                    <li class="item603">
                        <a href="<?= yii\helpers\Url::to('/optom', true) ?>"><span>Оптом</span></a>
                    </li>
                </ul>
            </div>  
        </div> 
        <div>
            <br />
            <?= yii\widgets\Breadcrumbs::widget([
                'homeLink' => ['label' => 'Главная', 'url' => '/'],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            
        </div>
        <div id="main">
    <div id="left_side">
        <div class="moduletable_left_m">
            <center><h3>Продукция:</h3></center>
            <?= app\widgets\menu\MainMenu::widget()?>
            
        </div>
        <div class="moduletable">
        <center>
            <p><img src="<?= yii\helpers\Url::to('images/sy0d0_croper_ru.png', true); ?>" alt="Телевизор в подарок" width="230" height="234" /></p>
            </center>
        </div>
        <div class="moduletable">
        <center>
            <p><img src="<?= yii\helpers\Url::to('images/5m73s_croper_ru.png', true); ?>" width="230" height="220" alt="5m73s croper_ru" /></p>
            <p>&nbsp;</p>
            </center>
        </div>
        <div class="moduletable_srtificate">
        <center>
            <h3>Сертификаты</h3>
            <a href="/index.php?option=com_content&amp;view=article&amp;id=43&amp;Itemid=38"><img src="<?= yii\helpers\Url::to('web/images/stories/sertifikat/1_Zertifikat_2010[1]mini.jpg', true); ?>" alt="" width="107"/></a>
            <a href="/index.php?option=com_content&amp;view=article&amp;id=43&amp;Itemid=38"><img src="<?= yii\helpers\Url::to('images/stories/sertifikat/1mini.jpg', true); ?>" alt="" width="107"/></a>
            </center>
        </div>
    </div>
    <div id="right_side">
        <div class="moduletable">
            <p><span style="font-family: 'arial black', 'avant garde'; font-size: 18pt; color: #800000;">&nbsp; &nbsp;<br/>Полная комплектация строительных объектов</span></p>
            <p><a href="<?= yii\helpers\Url::to('akcii', true) ?>"><img alt="baner" src="<?= yii\helpers\Url::to('images/baner.png', true); ?>" style="margin: 20px 0px;" height="78" width="717" /></a></p>
        </div>
        <div id="content">
            
                    <?= $content ?>    




    </div>
    <script type="text/javascript">
        window.onload = preloader()

        function preloader(){
            var preload = document.getElementById("spinner");
            preload.style.display = "none";
            var preloadDiv = document.getElementById("page-preloader");
            preloadDiv.style.display = "none";
        }

    </script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
