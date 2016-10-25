<?php

/* @var $this yii\web\View */

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;
use kartik\date\DatePicker;
//use kartik\widgets\DatePicker;

$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Личный кабинет'
]);

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'Личный кабинет'
]);

$this->title = 'Личный кабинет';
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    
    <div class="row">
    	<div class="col-lg-7">
	    	<div class="panel panel-success">
	  			<div class="panel-heading">
	  				Личная информация
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
	    				<b>Дополнительная информация:</b> <?= $user->info ?><br/>
	    			<?php endif;?>
	  			</div>
			</div>
			<?php if(($user->sex == 3) || empty($user->info) || empty($user->born)):?>
			<div class="panel panel-warning">
	  			<div class="panel-heading">
	  				Отсутствующая информация
	  			</div>
	  			<div class="panel-body">
	  				<p>Заполните, пожалуйста пустые поля</p>
	  				<?php $form = ActiveForm::begin([
        				'id' => 'reg-form',
        				'options' => ['class' => 'form-horizontal'],
        				'fieldConfig' => [
            				'template' => "{label}\n<div class=\"col-lg-8\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
            				'labelOptions' => ['class' => 'col-lg-4 control-label'],
        				],
    				]); ?>

    					<?php if($user->sex==3): ?>
	    					<?=$form->field($model2, 'sex')->dropdownList((['Мужской', 'Женский']), ['prompt'=>'Выберите из списка']);?>
	    				<?php endif;?>
	    				<?php if(empty($user->info)): ?>
	    					<?= $form->field($model2, 'info') ?>
	    				<?php endif;?>
	    				<?php if(empty($user->born)): ?>
	    					<div class="col-lg-4"><p align="right"><b>Дата рождения</b></p></div>
	    					<div class="col-lg-8">
	    					<?= DatePicker::widget([
									'model' => $model2, 
    								'attribute' => 'born',
    								'value' => '31.12.2010',
    								'pluginOptions' => [
        								'autoclose'=>true,
        								'format' => 'dd.mm.yyyy'
    								]
								]);
							?>
							<br/>
							</div>
	    				<?php endif;?>

	    				

	    				<br/>

    					<div class="form-group">
            				<div class="col-lg-12">
            					<center>
                					<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
                				</center>
            				</div>
        				</div>

    				<?php ActiveForm::end(); ?> 
	    			
	    			

	    			
	  			</div>
			</div>
			<?php endif;?>
		</div>
		<div class="col-lg-5">
			<div class="panel panel-info">
	  			<div class="panel-heading">
	  				Изменить пароль
	  			</div>
	  			<div class="panel-body">
	  				<?php $form = ActiveForm::begin([
        				'id' => 'reg-form',
        				'options' => ['class' => 'form-horizontal'],
        				'fieldConfig' => [
            				'template' => "{label}\n<div class=\"col-lg-8\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
            				'labelOptions' => ['class' => 'col-lg-4 control-label'],
        				],
    				]); ?>

    					<?= $form->field($model, 'password')->passwordInput() ?>

    					<?= $form->field($model, 'password2')->passwordInput() ?>

    					<div class="form-group">
            				<div class="col-lg-offset-1 col-lg-11">
                				<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
            				</div>
        				</div>

    				<?php ActiveForm::end(); ?> 
	  			</div>
	  		</div>
		</div>
    </div>
    <div class="row">
    	<div class="col-lg-12">
    		<div class="panel panel-primary">
	  			<div class="panel-heading">
	  				История покупок
	  			</div>
	  			<div class="panel-body">
	  				<?php if(!empty($history_of_buy)):?>
	  				<div class="table-responsive">
		  				<table class="table table-striped">
	  	  					<tr>
	  	  						<td>
	  	  							Наименование
	  	  						</td>
	  	  						<td>
	  	  							Изображение
	  	  						</td>
	  	  						<td>
	  	  							Количество
	  	  						</td>
	  	  						<td>
	  	  							Дата
	  	  						</td>
	  	  					</tr>
	  	  					<?php foreach ($history_of_buy as $buy):?>
		  	  					<tr>	
		  	  						<td>
		  	  							<a href="<?= Url::toRoute('/product/'.$buy['alias'], true)?>"><?= $buy['name'] ?></a>
		  	  						</td>
		  	  						<td>
		  	  							<img src="<?= Url::toRoute('/img/products/'.$buy['picture'], true)?>" height="100">
		  	  						</td>
		  	  						<td>
		  	  							<?= $buy['count'] ?>
		  	  						</td>
		  	  						<td>
		  	  							<?= $buy['date'] ?>
		  	  						</td>
		  	  					</tr>
	  	  					<?php endforeach;?>
		  				</table>
		  			</div>
		  			<?php else:?>
		  				<div class="alert alert-success">
		  					<center><p>Покупок не совершалось</p></center>
		  				</div>
		  			<?php endif;?>
	  			</div>
	  		</div>
    	</div>
    </div>

    
</div>
