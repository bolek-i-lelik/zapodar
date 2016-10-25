<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->registerMetaTag([
    'name' => 'description',
    'content' => $product->name
]);

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $product->keywords
]);

$this->title = $product->name;
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['/catalog']];
foreach ($bread as $value) {
    $this->params['breadcrumbs'][] = ['label' => $value['name'], 'url' => ['/category/'.$value['id']]];
}
$this->params['breadcrumbs'][] = $this->title;

Yii::$app->language = 'ru';

$foto = stristr($product->picture, ',', true);
$fotos = explode(",", $product->picture);
?>
<div class="product">
    <div class="row">

    	<div class="col-lg-7">
            <div class="mainPic">
            <center>
    		  <img id="mainPic" style="max-height: 500px;" src="/img/products/<?= $fotos[0] ?>" height="50" alt="" class="img-thumbnail">
              </center>
            <!--</div><br/><br/>
            <div>--><br/>
        		<center>
                 <?php if(count($fotos)>2):?>   
            		<?php if(isset($fotos[1])):?>
                        <img src="/img/products/<?= $fotos[0] ?>" alt="" height="50" onclick = "f_zoom(src);">
            			<?php foreach ($fotos as $key => $value): ?>
            				<?php if($key>0 && $value != ''): ?>
            					<img src="/img/products/<?= $value ?>" alt="" height="50" onclick = "f_zoom(src);">
            				<?php endif;?>	
            			<?php endforeach ?>
            		<?php endif;?>
                <?php endif?>
        		</center>
            </div>
            <p></p><p></p>
    	</div>
    	<div class="col-lg-5">
    		<p class="zapodarTitle"><?= Html::encode($this->title) ?></p>
            <p>Артикул: <?= $product->vendorcode ?></p>
            <?php if($product->nalichie=="+"): ?>
                <div class="stocks"><strong class="stock-high"><i class="icon16 stock-green"></i>В наличии</strong> </div>
            <?php else: ?>
                <div class="stocks"><strong class="stock-high"><i class="icon16 stock-green" style="background-position: -94.5px -118px;"></i>Нет в наличии</strong> </div>
            <?php endif;?>
    		<p style="font-size: 30pt;"><?= $product->price?> &#8381;</p>
            <?php if($guest == FALSE):?>
                <?php if($onbasket == FALSE):?>
                    <div id="basket">
                        <?php if($product->nalichie=="+"): ?>
                            
                                <button class="btn btn-danger" onclick="putInCorzina(<?= $product->productsid ?>, <?= Yii::$app->user->id ?>)">В корзину</button>
                            
                        <?php else:?>
                            <button class="btn btn-danger" disabled="disabled" onclick="putInCorzina(<?= $product->productsid ?>, <?= Yii::$app->user->id ?>)">В корзину</button>
                            
                        <?php endif?>
                        
                    </div>
                    <br><br>
                <?php else:?>
                    <p style="color:#064727; font-size: 15pt">В корзине</p>
                    <a href="<?= Url::toRoute('/basket', true)?>"><button class="btn btn-danger">Оформить заказ</button></a>
                    <br>
                <?php endif;?>
            <?php else:?>
                <p style="color:#952828; font-size: 15pt">Войдите или зарегистрируйтесь, чтобы положить в корзину</p>
            <?php endif;?>
                <p class="row">
                    <!--<div class="tabs">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab-1" data-toggle="tab">Описание</a></li>
                            <li><a href="#tab-2" data-toggle="tab">Характеристики</a></li>
                        </ul>

                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-1">
                            <p><?= $product->description ?></p>
                        </div>
                        <div class="tab-pane" id="tab-2">
                            
                        </div>
                    </div>-->
                    <div class="product_tabs">
        <div class="tabs_switcher">
            <a  id="a_tab1" class="active" href="#tab1" onclick="clic_tabs_switcher(this);"><span>Описание</span></a>
            <a id="a_tab2" class="" href="#tab2" onclick="clic_tabs_switcher(this);"><span>Характеристики</span></a>
        </div>

        <div class="tab_content" style="font-size: 16px;">
            <div id="tab1" class="tabs active">
                <?= $product->description?>
            </div>

            <div id="tab2" class="tabs ">
                <!--<?= $product->params?>-->
                <?php $paramArr = explode("|", $product->params); ?>
                    <?php foreach($paramArr as $prm): ?>
                        <?php if ($prm != ",," and $prm !=""): ?>
                            <?php $prm = explode("," , $prm); ?>
                            <?php $prmText = /*$prmText.*/"<b>".$prm[0]."</b>".": ".$prm[1]." ".$prm[2]."<br>" ?>
                        <?php endif ?>
                    <?php endforeach ?>
                <?php if(isset($prmText)){ echo $prmText;} ?>
            </div>

        </div>
    </div>
                    
                </p><br><br>
            
    	</div>
    </div>

    <div id="korzina"></div>
</div>

<script type="text/javascript">
    function clic_tabs_switcher(obj)
    {  
        
        if(obj.id=="a_tab1")
            {
                
                var nextA = document.getElementById("a_tab2");
                nextA.className ="";
                var content1 = document.getElementById("tab1"); 
                content1.className="tabs active"
                var content2 = document.getElementById("tab2"); 
                content2.className="tabs"
            } 
            else {
            var nextA = document.getElementById("a_tab1");
                nextA.className="";
                var content1 = document.getElementById("tab2"); 
                content1.className="tabs active"
                var content2 = document.getElementById("tab1"); 
                content2.className="tabs"
        }
        obj.className = "active";
    }
</script>