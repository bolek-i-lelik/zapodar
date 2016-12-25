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

    	<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
            <div class="mainPic">
            	<center>
                    <?php if (file_exists('img/products/'.$fotos[0])):?> 
                        <img id="mainPic" style="max-height: 450px;" src="/img/products/<?= $fotos[0] ?>" height="50" alt="" class="img-thumbnail">   
                    <?php else: ?>
                        <img id="mainPic" style="max-height: 450px;" src="/img/products/empty_thumb.jpg" alt= "" height="50" alt="" class="img-thumbnail">
                    <?php endif;?>
    		  		
              	</center>
            	<br>
        		<center>
        			<p><?php count($fotos) ?></p>
                 	<?php if(count($fotos)>1):?>   
            			<?php if(isset($fotos[1])):?>
                            <?php if (file_exists('img/products/'.$fotos[0])):?> 
                                <img src="/img/products/<?= $fotos[0] ?>" alt="" height="50" onclick = "f_zoom(src);">
                            <?php else: ?>
                                <img src="/img/products/empty_thumb.jpg" alt= "" height="50" onclick = "f_zoom(src);">
                            <?php endif;?>
                        		<?php foreach ($fotos as $key => $value): ?>
            						<?php if($key>0 && $value != ''): ?>
            					        <?php if (file_exists('img/products/'.$value)):?>
                                            <img src="/img/products/<?= $value ?>" alt="" height="50" onclick = "f_zoom(src);">
                                        <?php endif;?>
            						<?php endif;?>	
            					<?php endforeach ?>
            			<?php endif;?>
                	<?php endif?>
        		</center>
            </div>
            
    	</div>
    	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
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

            
    	</div>
    </div>
    <div class="row">
                    
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
                	<?php $paramArr = explode("|", $product->params); ?>
                    <?php $prmText ='';?>
                    	<?php foreach($paramArr as $prm): ?>
                        	<?php if ($prm != ",," and $prm !=""): ?>
                            	<?php $prm = explode("," , $prm); ?>
                                <?php if(isset($prm[0])){$prm0 = $prm[0];} ?>
                                <?php if(isset($prm[1])){$prm1 = $prm[1];} ?>
                                <?php if(isset($prm[2])){$prm2 = $prm[2];} ?>
                                <?php $prmText .= "<b>".$prm0."</b>".": ".$prm1." ".$prm2."<br>" ?>

                            <?php endif ?>
                            
                        <?php endforeach ?>
                    <?php if(isset($prmText)){ echo $prmText;} ?>
                        
                </div>
            </div>
        </div>
                    
    </div><br><br>
    <div class="row">
	    <!--<div class="body-content blockNews col-lg-12">
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
	    <div class="col-lg-12" >
	    	<?php foreach($products as $prod):?>
	        	<div class="progItemMain stecTov col-lg-1-5" style="font-syze: 14px;">
	            	<br>
	                <div class="prodImg">
	                	<a href="/product/<?= $prod['alias'] ?>" target="_self">
	                    	<img src="/img/products/<?= $prod['picture'] ?>" alt= "<?= $prod['name'] ?>">
	                    </a>
	                </div>
	                <br>
	                                
	                <div><?= $prod['name'] ?></div>
	                <div><br></div>
	                <div><b><?= $prod['price']?> руб.</b></div>
	                <div><br></div>
	                <div style="bottom: 25px; position: absolute;">
	                                
	                	<a href="<?= Url::toRoute('/product/'.$prod['alias'], true)?>"><button class="btn btn-success" style="font-size: 16px;" >подробнее</button></a>
	                </div>
	            </div>
	        <?php endforeach;?>

	                    
	    </div>
	    <div class="col-lg-12" ><br><br></div>
	    <div id="korzina"></div>-->
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
		    <!--<div class="col-lg-1"></div>-->
		    <?php foreach($products as $prod):?>
		        <div class="progItemMain col-lg-2 col-md-3 col-sm-4 col-xs-11" style="font-syze: 14px;">
		            <br/>
		            <div class="prodImg">
		                <a href="/product/<?= $prod['alias'] ?>" target="_self">
                            <?php if($prod['picture']):?>
    		                    <?php if (file_exists('img/products/'.$prod['picture'])):?>   
                                    <img src="/img/products/<?= $prod['picture'] ?>" alt= "<?= $prod['name'] ?>">
                                <?php else: ?>
                                    <img src="/img/products/empty_thumb.jpg" alt= "<?= $prod['name'] ?>">
                                <?php endif;?>
                            <?php else:?>
                                <img src="/img/products/empty_thumb.jpg" alt= "<?= $prod['name'] ?>">
                            <?php endif;?>
		                </a>
		            </div>
		            <br/>
		                
		            <div><?= $prod['name'] ?></div>
		            <div><br></div>
		            <div><b><?= $prod['price']?> руб.</b></div>
		            <div><br></div>
		            <div style="position: absolute; bottom: 10px;">
		               
		                <a href="<?= Url::toRoute('/product/'.$prod['alias'], true)?>"><button class="btn btn-success" style="font-size: 16px;" >подробнее</button></a>
		            </div>
		        </div>
		    <?php endforeach;?>

		    <!--<div class="col-lg-1"></div>-->
		</div>
	</div>
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