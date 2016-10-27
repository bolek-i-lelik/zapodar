<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Zakaz */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zakaz-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php if($model->sost == 1){$model->sost = 'Новый';} ?>
    <?php if($model->sost == 2){$model->sost = 'В работе';} ?>
    <?php if($model->sost == 3){$model->sost = 'Выполнен';} ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'sost',
            'date',
            //'user_id',
            'info:html',
        ],
    ]) ?>

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
                        <b>Дополнительная информация:</b> <?= $user->info ?><br/>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    Состав заказа
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <td>
                                <b>Наименование</b>
                            </td>
                            <td>
                                <b>Артикул</b>
                            </td>
                            <td>
                                <b>Количество</b>
                            </td>
                            <td>
                                <b>Цена</b>
                            </td>
                            <td>
                                <b>Скидка</b>
                            </td>
                            <td>
                                <b>Сумма</b>
                            </td>
                        </tr>
                        <?php $itog = 0;?>
                        <?php foreach ($products as $pr):?>
                            <?php foreach ($pr as $key => $product):?>
                                
                            <tr>
                                <td>
                                    <?= $product->name ?>
                                </td>
                                <td>
                                    <?= $product->vendorcode ?>
                                </td>
                                <td>
                                    <?= $key ?>
                                </td>
                                <td>
                                    <?= $product->price ?>
                                </td>
                                <td>
                                    <?= $product->sale ?>
                                </td>
                                <td>
                                    <?= $key * (1 - $product->sale) * $product->price ?>
                                </td>
                            </tr>
                            <?php $itog = $itog + ($key * (1 - $product->sale) * $product->price);?>
                            <?php endforeach;?>
                        <?php endforeach;?>
                    </table>
                    Итоговая сумма заказа: <?= $itog ?> рублей.
                </div>
            </div>
        </div>
    </div>

</div>
