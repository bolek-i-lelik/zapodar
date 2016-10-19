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
    					<?= $products[$value->product_id]['price'] ?>
    				</td>
    				<td>
    					<?= $value->count ?>
    				</td>
    				<td>
    					<?= $products[$value->product_id]['price'] * $value->count ?>
    					<?php $allprice = ($products[$value->product_id]['price'] * $value->count) + $allprice ;?>
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
		<button class="btn btn-danger">Очистить корзину</button>
		<button class="btn btn-primary">Сохранить</button>
    </center>
</div>
