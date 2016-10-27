<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use app\models\Statistic;

use yii\bootstrap\ActiveForm;

$stat = Statistic::find()->where(['pokaz'=>1])->all();

AppAsset::register($this);
Yii::$app->language = 'ru';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <!--<link rel="stylesheet" href="http://gifts.ru/Logrus-theme/css/giftstyle.css?v=258" type="text/css">-->
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="https://fonts.googleapis.com/css?family=Marck+Script|Rubik" rel="stylesheet"> 
</head>
<body>

<header id="j_header" class="header static search-main j_main_page">
    <div class="corp_menu logrus-ajax-load" data-type="header-anonymous-menu">
        <span class="phone hint hint_right" data-hint="Наш контактный телефон" style = "color: #153928;">
            <i class="fa fa-phone" aria-hidden="true"></i>
                (495) 737-90-22
        </span>
        <a href="/about">   О нас   </a>   
        <a href="/new/">   Новости   </a>   
        <a href="/action">   Акции   </a>   
        <a href="/partner">   Партнерам   </a>   
        <a href="/contact">   Контакты   </a>   
        <?php if(!Yii::$app->user->isGuest):?>
            <a href="/cabinet">   Личный кабинет   </a>
        <?php endif;?>
    </div>
    <div class="hb">
        <div class="page-container">
            <ul class="hb-items hb-items-search-main j_search_mode">
                <li class="hb-but hb-but-logo hb-but-main"> 
                    <a href="/">
                        <span class="hb-but-wrap" style = "vertical-align: middle; display: inline-block;">
                            <p style="color:#AACF9D; vertical-align: middle; display: inline-block; font: 28px 'Open Sans',Arial,sans-serif">"DECO Media"</p>
                        </span>
                    </a>
                </li>
                <li class="hb-but hb-but-catalog hb-but-main">  
                    <a href="/site/catalog" >
                        <span class="hb-but-wrap">
                            <img class="hb-but-icon" src="<?= Url::toRoute('/img/menu.svg', true)?>" alt="Каталог"> 
                            <span class="hb-but-text" style="color:#AACF9D;"><b>Каталог</b></span>
                        </span>
                    </a> 
                </li>
                <li class="hb-but hb-but-search hb-but-main"> 
                    <input id="hb-but-search" class="j_search_cb j_hcb j_main_page j_off" type="checkbox" > 
                        <label class="hb-but-action j_off" for="hb-but-search" id="j_search_toggler" onclick="searchBTN();">
                            <span class="hb-but-wrap">
                                <img class="hb-but-icon" src="<?= Url::toRoute('/img/search.png', true)?>" alt="Поиск"> 
                                <span id="j_search_button" class="hb-but-text" style="color:#AACF9D" font-size: 14px;><b>Поиск</b></span>
                            </span>
                        </label>
                        <div class="hb-mod hb-mod-full hb-mod-search">
                            <form id="j_main_search_form" action="/search" method="get" class="form_light -metrika-noform j_off">
                                <div class="hb-mod-wrap" style="text-align: center" > 
                                    <button class="btn hb-mod-search-btn show j_off" id="j_search_submit">
                                        <img class="hb-but-icon" src="<?= Url::toRoute('/img/search.png', true)?>" alt="Найти">
                                    </button> 
                                    <input id="j_search_main" class="hb-mod-search-input inp j_off" tabindex="1" autocomplete="off" placeholder="поиск" name="hash" maxlength="1000" value="" type="text">
                                        <div class="grid">
                                            <div class="col-4-12"> 
                                                <input class="j_filterId" name="filterid" value="1001" type="hidden"> 
                                                <input class="j_filterMin" name="1001minvalue" value="0" type="hidden"> 
                                                <input class="j_filterMax" name="1001maxvalue" value="99999" type="hidden"> 
                                                <input class="j_filterInput1 inp j_off" autocomplete="off" maxlength="5" value="" name="1001value1" placeholder="категория" type="text">
                                            </div>
                                            <div class="col-4-12 j_ot"> 
                                                <input class="j_filterId" name="filterid" value="1000" type="hidden"> 
                                                <input class="j_filterMin" name="1000minvalue" value="0" type="hidden"> 
                                                <input class="j_filterMax" name="1000maxvalue" value="999999" type="hidden"> 
                                                <input class="j_filterInput1 inp j_off" maxlength="6" value="" name="1000value1" placeholder="цена от" type="text">
                                            </div>
                                            <div class="col-4-12 j_do"> 
                                                <input class="j_filterInput2 inp j_off" maxlength="6" value="" name="1000value2" placeholder="цена до" type="text">
                                            </div>
                                        </div>
                                </div>
                            </form>
                            <div class="hb-mod-search-result hidden" id="j_msac_host">
                                <div class="hb-mod-wrap j_off" id="j_msac_list"></div>
                        	</div>
                		</div>
            	</li>
            	<li class="hb-but hb-but-main hb-but-messages">  
                	<input id="hb-but-messages" class="j_hcb j_off" type="checkbox"> 
                	<label class="hb-but-action" for="hb-but-messages">
                    	<span class="hb-but-wrap">
                        	<img class="hb-but-icon" src="<?= Url::toRoute('/img/letter.png', true)?>" alt="Контакты">
                        	<span class="hb-but-text" style="color:#AACF9D;"><b>Написать</b></span>
                    	</span>
                	</label> 
                	<div id="j_feedbackBlock" class="hb-mod hb-mod-dark hb-mod-messages hb-mod-left">
                        <div class="hb-mod-wrap">
                            <div id="resMessage"></div>
                        	<div class="h4_header">Отправка сообщения</div>
                            	<input id="j_page_location" class="hidden" name="srcpage" value="" type="text">
                            	<ul class="form_hor">
                                	<li>
                                    	<input class="inp" name="adgj" required="" placeholder="ваше имя" value="" type="text" id="name">
                                    	<input class="hidden" name="message" value="" type="text">
                                	</li>
                                	<li>
                                    	<input class="inp" required="" name="sfhk" placeholder="электронная почта" value="" type="text" id="email">
                                    	<input style="display:none;" name="message1" value="" type="text">
                                	</li>
                                	<li>
                                    	<input required="" class="inp" name="xvnm" placeholder="телефон" value="" type="text" id="town">
                                    	<input style="display:none;" tabindex="-1" name="message2" value="" type="text">
                                	</li>
                                	<li>
                                    	<textarea required="" class="txtr" name="wqretyiu" rows="10" maxlength="9000" placeholder="Текст сообщения" id="text"></textarea>
                                	</li>
                            	</ul>
                            	<button class="bton" type="submit" onclick="sendMessage()">Отправить сообщение</button>
                        	
                    	</div>
                	</div>
            	</li> 
            	<li id="j_carthost" class="hb-but hb-but-cart hb-but-main">
            		<a class="hb-but-action hb-but-hover" id="cart" href="<?= Url::toRoute('/basket', true)?>">
            			
                		<span class="hb-but-wrap">
                    		<img class="hb-but-icon" src="http://buhcomfort.ru/img/bug.png" alt="Корзина">
                            <?php if(Yii::$app->user->isGuest):?>
                                <span class="hb-but-text" style="color:#AACF9D;"><b>Корзина </b></span>
                            <?php else:?>
                    		    <span class="hb-but-text" style="color:#AACF9D;"><b>Корзина </b><b>
                                    <div style="height: 20px; width: 20px; margin-top: -30px; margin-left: -20px; background-color: rgb(207, 157, 195); border-radius: 10px;">
                                    <p style="height: 20px; width: 20px; font-size: 12px; padding: 0px; color: rgb(0, 0, 0); text-align: center;"><?= Yii::$app->request->cookies['countbasket'] ?></p></div>
                                    </b></span>
                            <?php endif;?>
                		</span>
            		</a>
                	
            	</li>
 
				<li class="hb-but hb-but-login hb-but-main">
					<input id="hb-but-login" class="j_hcb j_off" type="checkbox">
					<label for="hb-but-login">
						<span class="hb-but-wrap">
							<?php if(Yii::$app->user->isGuest):?>
								<a href="<?= Url::toRoute('/login', true)?>">
									<img class="hb-but-icon" src="<?= Url::toRoute('/img/enter.png', true)?>" >
									<span class="hb-but-text" style="color:#AACF9D;"><b>Вход/Регистрация</b></span>
								</a>
							<?php else:?>
                                
								<form class="navbar-form" style="height: 50px;" action="/site/logout" method="post">
                                    
									<input type="hidden" name="_csrf" value="<?= Html::csrfMetaTags() ?><button type="submit" style="margin-top: 10px; vertical-align: baseline; color:#AACF9D;" class="btn btn-link"><b>Выйти<br><br></b></button>
								</form>
							<?php endif;?>
						</span>
					</label>

				
				</li>
        	</ul>
    	</div>
	</div>
</header>
<div class="container">
    <!--<div class="container minStyle">-->
    <br>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

        <?= $content ?>
    <!--</div>-->
</div>

<footer class="footer footerStyle">

 <div class="footer-links " style="background-color:#064727">
 	<center>
 		<div class="page-container grid">
        
      		<div class="col-lg-2 col-md-2 col-sm-2 hidden-xs ">
      			
                <a href="/site/catalog">
                    <p class="footer-header" style="color:#AACF9D;">
                        <b>Каталог</b>
                    </p>
                </a> 
      		</div>
      		<div class="col-lg-2 col-md-2 col-sm-2 hidden-xs"> 
                <a href="/site/about">
                    <p class="footer-header" style="color:#AACF9D;">
                        <b>О нас</b>
                    </p>
                </a> 
      		</div>
      		<div class="col-lg-2 col-md-2 col-sm-2 hidden-xs"> 
                <a href="/new/">
                    <p class="footer-header" style="color:#AACF9D;"><b>Новости</b>
                    </p>
                </a> 
      		</div>
      		<div class="col-lg-2 col-md-2 col-sm-2 hidden-xs"> 
                <a href="/site/action">
                    <p class="footer-header" style="color:#AACF9D;"><b>Акции</b></p>
                </a> 
      		</div>
      		<div class="col-lg-2 col-md-2 col-sm-2 hidden-xs">
                <a href="/site/partner">
                    <p class="footer-header" style="color:#AACF9D;"><b>Партнерам</b></p>
                </a> 
      		</div>   
      		<div class="col-lg-2 col-md-2 col-sm-2 hidden-xs">  
                <a href="/site/contact">
                    <p class="footer-header" style="color:#AACF9D;"><b>Контакты</b></p>
                </a> 
      		
            </div>  
      	</div>
    </center>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 visible-xs">
                <a href="/site/catalog">
                    <p class="footer-header" style="color:#AACF9D;">
                        <b>Каталог</b>
                    </p>
                </a> 
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 visible-xs">
                <a href="/site/about">
                    <p class="footer-header" style="color:#AACF9D;">
                        <b>О нас</b>
                    </p>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 visible-xs">
                <a href="/new/">
                    <p class="footer-header" style="color:#AACF9D;"><b>Новости</b>
                    </p>
                </a> 
            </div>
            <div class="col-xs-12 visible-xs">
                <a href="/site/action">
                    <p class="footer-header" style="color:#AACF9D;"><b>Акции</b></p>
                </a>
            </div>
            <div class="col-xs-12 visible-xs">
                <a href="/site/partner">
                    <p class="footer-header" style="color:#AACF9D;"><b>Партнерам</b></p>
                </a>
            </div>
            <div class="col-xs-12 visible-xs">
                <a href="/site/contact">
                    <p class="footer-header" style="color:#AACF9D;"><b>Контакты</b></p>
                </a>
            </div>
        </div>
    </div>

    <div class="wrapper">
    <center>
			<span >
				(495) 737-90-22     |
			</span>
			<span >     107023, Москва, ул. Большая Семеновская, 49.      |
			</span>
			<span>
				      Copyright &copy; DEKO Media, 2002 - 2016.     
			</span>
</center>
<?php foreach($stat as $st): ?>
    <?= $st->text ?>
<?php endforeach;?>
	</div>
  </div>
</footer>
<script type="text/javascript">
	function searchBTN()
	{
		var chec = document.getElementById("hb-but-search");
		var slo = document.getElementById("j_header");
		if(chec.checked == false){slo.style = "margin-bottom:140px;"}
			else{slo.style = "margin-bottom:0px;"}
		
	}
</script>
<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>