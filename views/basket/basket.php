<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Корзина';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="basket">

	<div class="table-responsive">
  		<table class="table table-striped">
    		<tr>
    			<td>
    				<b>
    					№п/п
    				</b>
    			</td>
    			<td>
    				<b>
    					Изображение
    				</b>
    			</td>
    			<td>
	    			<b>
	    				Название
	    			</b>
    			</td>
    			<td>
	    			<b>
	    				Цена, руб.
	    			</b>
    			</td>
    			<td>
	    			<b>
	    				Количество
	    			</b>
    			</td>
    			<td>
	    			<b>
	    				Сумма, руб.
	    			</b>
    			</td>
    		</tr>
    		<?php $a = 1;?>
    		<?php $allprice = 0;?>
    		<?php foreach ($in_basket as $value):?>
    			<tr>
    				<td>
    					<?= $a ?>
    					<?php $a = $a + 1;?>
    				</td>
    				<td>
    					<img src="/img/products/<?= $foto = stristr($products[$value->product_id]['picture'], ',', true)?>" height="150">
    				</td>
    				<td>
    					<a href="/product/<?= $products[$value->product_id]['alias'] ?>"><?= $products[$value->product_id]['name'] ?></a>
    				</td>
    				<td>
    					<?= $products[$value->product_id]['price']*(1 - $products[$value->product_id]['sale']) ?>
    				</td>
    				<td>
                        <div id="countinbasket"><?= $value->count ?></div>
                        <button class="btn btn-default btn-xs" onclick="minusP(<?=($value->count)-1?>, <?= $value->id ?>)">-</button>
                                        
                            <!--<input type="text" placeholder="1" size="3"  value="1" id="<?=($value->count)?>" name="<?=$value->product_id['price']?>">-->
                            
                        <button class="btn btn-default btn-xs" onclick="plusP(<?=($value->count)+1?>,<?= $value->id ?>)">+</button>
    					<br/><br/>
                        <button class="btn btn-danger" onclick="delFromBasket(<?= $value->id ?>,<?= Yii::$app->user->id ?>)">Удалить</button>
    				</td>
    				<td>
    					<?= $products[$value->product_id]['price']*(1 - $products[$value->product_id]['sale']) * $value->count ?>
    					<?php $allprice = (($products[$value->product_id]['price'] *(1 - $products[$value->product_id]['sale'])* $value->count)) + $allprice ;?>
    				</td>
    			</tr>
    		<?php endforeach;?>
    		<tr>
    			<td colspan="5">
    				
    			</td>    
    			<td>
    				<b>Итого: <?= $allprice ?></b>
    			</td>			
    		</tr>
  		</table>
	</div>
	<center>
		<button class="btn btn-success">Отправить заказ</button>
		<button class="btn btn-danger" onclick="deleteall(<?= Yii::$app->user->id ?>)">Очистить корзину</button>
    </center>
</div>
