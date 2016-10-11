<?php

/* @var $this yii\web\View */

$this->title = 'Подарки';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">
        <hr>
        <div class="row">
        <?php foreach ($news as $new):?>
            <div class="col-lg-4">
                <h2><?= $new->name ?></h2>
                <img src="/img/news/<?= $new->prev_foto ?>">
                <p><?= $new->prev_text ?></p>

                <p><a class="btn btn-success" href="/new/<?= $new->alias ?>">подробнее</a></p>
            </div>
        <?php endforeach;?>    
        </div>

    </div>
</div>
