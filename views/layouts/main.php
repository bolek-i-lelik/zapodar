<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

use yii\bootstrap\ActiveForm;

AppAsset::register($this);
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
        <a href="/site/about">   О нас   </a>   
        <a href="/new/">   Новости   </a>   
        <a href="/site/action">   Акции   </a>   
        <a href="/site/partner">   Партнерам   </a>   
        <a href="/site/contact">   Контакты   </a>   
        
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
                            <form id="j_main_search_form" action="/site/search" method="post" class="form_light -metrika-noform j_off">
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
                        	<form id="j_feedback_header" action="/contacts/feedback" class="-metrika-noform j_off" method="post">
                            	<div class="h4_header">Отправка сообщения</div>
                            	<input id="j_page_location" class="hidden" name="srcpage" value="" type="text">
                            	<ul class="form_hor">
                                	<li>
                                    	<input class="inp" name="adgj" required="" placeholder="ваше имя" value="" type="text">
                                    	<input class="hidden" name="message" value="" type="text">
                                	</li>
                                	<li>
                                    	<input class="inp" required="" name="sfhk" placeholder="электронная почта" value="" type="text">
                                    	<input style="display:none;" name="message1" value="" type="text">
                                	</li>
                                	<li>
                                    	<input required="" class="inp" name="xvnm" placeholder="город" value="" type="text">
                                    	<input style="display:none;" tabindex="-1" name="message2" value="" type="text">
                                	</li>
                                	<li>
                                    	<textarea required="" class="txtr" name="wqretyiu" rows="10" maxlength="9000" placeholder="Текст сообщения"></textarea>
                                	</li>
                            	</ul>
                            	<button class="bton" type="submit">Отправить сообщение</button>
                        	</form>
                    	</div>
                	</div>
            	</li> 
            	<li id="j_carthost" class="hb-but hb-but-cart hb-but-main">
            		<a class="hb-but-action hb-but-hover" id="cart" href="/howtobuy">
            			<span id="kzn" class="badge pull-right" style="background:#AACF9D;"><?= Yii::$app->request->cookies['countbasket'] ?></span>
                		<span class="hb-but-wrap">
                    		<img class="hb-but-icon" src="http://buhcomfort.ru/img/bug.png" alt="Корзина">
                    		<span class="hb-but-text" style="color:#AACF9D;"><b>Корзина</b></span>
                		</span>
            		</a>
                	<div class="hb-mod hb-mod-dark hb-mod-info">
                    	<div class="hb-mod-wrap">
                        	<div class="h3_header">Условия оформления заказа</div>
                        	<p></p>
                    	</div>
                	</div>
            	</li>
 <!--           <li class="hb-but hb-but-login hb-but-main">
                <input id="hb-but-login" class="j_hcb j_off" type="checkbox">
                <label for="hb-but-login">
                    <span class="hb-but-wrap">
                        <a href="<?= Url::toRoute('/site/login', true)?>" class="bton btn-sm">Войти</a>
                    </span>
                </label>
            </li> -->
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
								<form class="navbar-form" action="/site/logout" method="post">
									<input type="hidden" name="_csrf" value="<?= Html::csrfMetaTags() ?>"><button type="submit" class="btn btn-link">Выйти</button>
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
 <div class="row " style="background-color:#064727">
 	<center>
 		<div class="col-lg-9">
      		<div class="col-lg-6">
      			<center>

                	<a href="/">
                    	<span class="hb-but-wrap" style="vertical-align: middle; display: inline-block;">
                        	<p style="color:#AACF9D; vertical-align: middle; display: inline-block; font: 28px 'Open Sans',Arial,sans-serif">"DECO Media"</p>
                    	</span>
                	</a>
            	</center>
      		</div>
      		<div class="col-lg-1">
                <a href="/site/catalog">
                    <span class="hb-but-wrap">
                        <span class="hb-but-text" style="color:#AACF9D;"><b>Каталог</b></span>
                    </span>
                </a> 
      		</div>
      		<div class="col-lg-1"> 
                <a href="/site/about">
                    <span class="hb-but-wrap">
                        <span class="hb-but-text" style="color:#AACF9D;"><b>О нас</b></span>
                    </span>
                </a> 
      		</div>
      		<div class="col-lg-1"> 
                <a href="/new/">
                    <span class="hb-but-wrap">
                        <span class="hb-but-text" style="color:#AACF9D;"><b>Новости</b></span>
                    </span>
                </a> 
      		</div>
      		<div class="col-lg-1"> 
                <a href="/site/action">
                    <span class="hb-but-wrap">
                        <span class="hb-but-text" style="color:#AACF9D;"><b>Акции</b></span>
                    </span>
                </a> 
      		</div>
      		<div class="col-lg-1">
                <a href="/site/partner">
                    <span class="hb-but-wrap">
                        <span class="hb-but-text" style="color:#AACF9D;"><b>Партнерам</b></span>
                    </span>
                </a> 
      		</div>   
      		<div class="col-lg-1">  
                <a href="/site/contact">
                    <span class="hb-but-wrap">
                        <span class="hb-but-text" style="color:#AACF9D;"><b>Контакты</b></span>
                    </span>
                </a> 
      		</div>     
      	</div>
    </center>
    <div class="col-lg-12">
		<div class="corp_menu logrus-ajax-load" data-type="header-anonymous-menu">
			<span class="phone hint hint_right" data-hint="Наш контактный телефон" style="color: #153928;">
				<i aria-hidden="true"></i>
				(495) 737-90-22
			</span>
			<span class="phone hint hint_right" style ="width: 500px;">
				<p>107023, Москва, ул. Большая Семеновская, 49. </p>
			</span>
			<span>
				Copyright &copy; DEKO Media, 2002 - 2016.
			</span>
		</div> <br/>
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