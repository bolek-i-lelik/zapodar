<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

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
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    Информация о покупателе
                </div>
                <div class="panel-body">
                    <?php if(!empty($user->familie)): ?>
                        <b>Фамилия:</b> <?= $user->familie ?><br/>
                    <?php endif;?>
                    <?php if(!empty($user->name)): ?>
                        <b>Имя:</b> <?= $user->name ?><br/>
                    <?php endif;?>
                    <?php if(!empty($user->father)): ?>
                        <b>Отчество:</b> <?= $user->father ?><br/>
                    <?php endif;?>
                    <?php if(!empty($user->born)): ?>
                        <b>Дата рождения:</b> <?= $user->born ?><br/>
                    <?php endif;?>
                    <?php if($user->sex != 3):?>
                        <b>Пол:</b> 
                        <?php if($user->sex == 0):?>
                            Мужской
                        <?php elseif($user->sex ==1):?>
                            Женский
                        <?php endif;?>
                        <br/>
                    <?php endif;?>
                    <?php if(!empty($user->e_mail)): ?>
                        <b>E-mail:</b> <?= $user->e_mail ?><br/>
                    <?php endif;?>
                    <?php if(!empty($user->tel)): ?>
                        <b>Телефон:</b> <?= $user->tel ?><br/>
                    <?php endif;?>
                    <?php if(!empty($user->adress)): ?>
                        <b>Адрес:</b> <?= $user->adress ?><br/>
                    <?php endif;?>
                    <?php if(!empty($user->info)): ?>
                        <b>Дополнительная информация:</b> <?= $user->info ?><br/><br/>
                    <?php endif;?>
                    <a href="<?= Url::toRoute('/cabinet', true)?>"><button class="btn btn-success">Изменить информацию</button></a>
                </div>

            </div>
            
        </div>
    </div>


	<center>
		<button class="btn btn-success" onclick="newzakaz(<?= Yii::$app->user->id ?>)">Отправить заказ</button>
		<button class="btn btn-danger" onclick="deleteall(<?= Yii::$app->user->id ?>)">Очистить корзину</button>
    </center>
    <br/>
</div>
<div class="row">
    <div class="col-lg-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#help" data-toggle="tab">Помощь</a></li>
            <li><a href="#zakaz" data-toggle="tab">Заказ</a></li>
            <li><a href="#oplata" data-toggle="tab">Оплата</a></li>
            <li><a href="#dostavka" data-toggle="tab">Доставка</a></li>
            <li><a href="#question" data-toggle="tab">Задать вопрос</a></li>
        </ul>
    </div>
</div>
<div class="tab-content">
    <div class="tab-pane active" id="help">
        <div class="panel-group" id="accordion">
            <?php $collapse = 0;?>
            <?php foreach ($hleps as $hlep):?>
                <div class="panel panel-success">
                <div class="panel-heading">
                  <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $collapse ?>">
                            <?= $hlep->vopros ?>
                          </a>
                        </h4>
                </div>
                <div id="collapse<?= $collapse ?>" class="panel-collapse collapse <?php if($collapse==0){echo 'in';} ?>">
                  <div class="panel-body">
                    <?= $hlep->otvet ?>
                  </div>
                </div>
              </div>
            <?php $collapse = $collapse +1; ?>
            <?php endforeach;?>

              
              
              
</div>
    </div>
    <div class="tab-pane" id="zakaz">
        <?= $texts['zakaz']->text ?>
    </div>
    <div class="tab-pane" id="oplata">
        <?= $texts['oplata']->text ?>
    </div>
    <div class="tab-pane" id="dostavka">
        <?= $texts['dostavka']->text ?>
    </div>
    <div class="tab-pane" id="question">
        <p>Задайте Ваш вопрос:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'reg-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-7\">{input}</div>\n<div class=\"col-lg-10\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-4 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'familie')->textInput(['placeholder' => $user->familie]) ?>

        <?= $form->field($model, 'name')->textInput(['placeholder' => $user->name])?>

        <?= $form->field($model, 'father')->textInput(['placeholder' => $user->name]) ?>

        <?= $form->field($model, 'email')->input('email',['placeholder' => $user->e_mail]) ?>

        <?= $form->field($model, 'adress')->textInput(['placeholder' => $user->adress]) ?>

        <?= $form->field($model, 'company')?>

        <?= $form->field($model, 'dolgnost') ?>

        <?= $form->field($model, 'text')->textArea(['rows' => '6']) ?>

        <?= $form->field($model, 'verifyCode')->widget(Captcha::className()) ?>

        <div class="form-group">
            <div class="col-lg-12">
            <center>
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                </center>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>