
<?php

use yii\helpers\Url;

?>


                

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?= $count_buy ?>
                                    </h3>
                                    <p>
                                        Новых заказов
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="<?= Url::toRoute('/zakaz/index', true)?>" class="small-box-footer">
                                    Просмотреть <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        <?= $count_buy_yes ?>
                                    </h3>
                                    <p>
                                        Выполнено заказов
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="<?= Url::toRoute('/zakaz/index', true)?>" class="small-box-footer">
                                    Подробнее <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        <?= $count_users ?>
                                    </h3>
                                    <p>
                                        Пользователей
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="<?= Url::toRoute('/user', true)?>" class="small-box-footer">
                                    подробнее <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        <?= $count_buy_in_work ?>
                                    </h3>
                                    <p>
                                        Заказы в работе
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="<?= Url::toRoute('/zakaz/index', true)?>" class="small-box-footer">
                                    Подробнее <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->

                    <!-- top row -->
                    <div class="row">
                        <div class="col-xs-12 connectedSortable">
                            
                        </div><!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-6 connectedSortable">
                            <!-- Map box -->
                            

                            

                            <!-- TO DO List -->
                            

                        </section><!-- right col -->
                    </div><!-- /.row (main row) -->

                
