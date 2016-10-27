<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
//use app\assets\AppAsset;
use app\assets\AdminAsset;

//AppAsset::register($this);
AdminAsset::register($this);



?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    </head>
    <body  class="skin-blue">
    <?php $this->beginBody() ?>

        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?= Url::toRoute('/admin', true)?>" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                AdminLTE
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                
                
            </nav>
        </header>
        <div class="wrapper">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="">
                            <a href="#">
                                <i class="fa fa-dashboard"></i> 
                                <span>Материалы</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="" style="margin-left: 25px; margin-bottom:5px;">
                                <li><a href="<?= Url::toRoute('/news/index', true)?>"><i class="fa fa-angle-double-right"></i> Новости</a></li>
                                <li><a href="<?= Url::toRoute('/article', true)?>"><i class="fa fa-angle-double-right"></i> Прочие</a></li>
                                
                            </ul>
                        </li>
                        <li>
                            <a href="<?= Url::toRoute('/categorys', true)?>">
                                <i class="fa fa-th"></i> <span>Категории</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Продукция</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="" style="margin-left: 25px; margin-bottom:5px;">
                                <li><a href="<?= Url::toRoute('/admin/upload', true)?>"><i class="fa fa-angle-double-right"></i> Загрузить</a></li>
                                <li><a href="<?= Url::toRoute('/products', true)?>"><i class="fa fa-angle-double-right"></i> Просмотреть</a></li>
                                
                            </ul>
                        </li>
                        <li>
                            <a href="<?= Url::toRoute('/user', true)?>">
                                <i class="fa fa-laptop"></i>
                                <span>Пользователи</span>
                                
                            </a>
                            
                        </li>
                        <li class="treeview">
                           <a href="<?= Url::toRoute('/slider', true)?>">
                                <i class="fa fa-laptop"></i>
                                <span>Слайдер</span>
                                
                            </a>
                        </li>
                        <li>
                            <a href="<?= Url::toRoute('/zakaz/index', true)?>">
                                <i class="fa fa-calendar"></i> <span>Заказы</span>
                                
                            </a>
                        </li>
                        <li>
                            <a href="<?= Url::toRoute('/hlep/index', true)?>">
                                <i class="fa fa-bar-chart-o"></i> <span>Вопрос-ответ</span>
                                
                            </a>
                        </li>
                        <li class="">
                            <a href="#">
                                <i class="fa fa-envelope"></i>
                                <span>Обращения пользователей</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="" style="margin-left: 25px; margin-bottom:5px;">
                                <li><a href="<?= Url::toRoute('/messages/index', true)?>"><i class="fa fa-angle-double-right"></i> Из шапки</a></li>
                                <li><a href="<?= Url::toRoute('/question/index', true)?>"><i class="fa fa-angle-double-right"></i> Из корзины</a></li>
                                
                            </ul>
                        </li>
                        <li>
                            <a href="<?= Url::toRoute('/statistic/index', true)?>">
                                <i class="fa fa-bar-chart-o"></i> <span>Счётчики статистики</span>
                                
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <aside class="right-side">
            
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <section class="content-header">
                    <h1>
                        Панель администратора
                        
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i>Сайт</a></li>
                        <li class="active">Панель администратора</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <?= $content ?>
                </section><!-- /.content -->
            </aside>
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        


    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>