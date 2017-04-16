<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Подарочная упаковка - фото'
]);

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'Подарочная упаковка - фото'
]);

$this->title = 'Галерея - подарочная упаковка';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-gallery">
<center><h1><?= Html::encode($this->title) ?></h1></center>
<?php $count = 0;?>
<?php $max = count($files);?>
<?php $min = 1;?>
<?php $number_photo = 1;?>
<div class="container">
<?php foreach ($files as $file):?>
    <?php if($count <12 && $count != 0 && $count != 11 && $min < $max):?>
        <div class="col-lg-1">
            <table class="table table-bordered">
                <tr>
                    <td>
                        <center><?= $number_photo?></center>
                        <?php $number_photo += 1;?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="addPhoto('<?= $file ?>')">
                            <img src="/img/pack/<?= $file ?>" width="75px">
                        </a>
                    </td>
                </tr>
            </table>
        </div>
        <?php $count += 1;?>
    <?php elseif($count == 0  && $min < $max):?>
        <div class="row">
            <div class="col-lg-1">
                <table class="table table-bordered">
                    <tr>
                        <td>
                            <center><?= $number_photo?></center>
                            <?php $number_photo += 1;?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="addPhoto('<?= $file ?>')">
                                <img src="/img/pack/<?= $file ?>" width="75px">
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        <?php $count += 1;?>
    <?php elseif($count == 11  && $min < $max):?>
            <div class="col-lg-1">
                <table class="table table-bordered">
                    <tr>
                        <td>
                            <center><?= $number_photo?></center>
                            <?php $number_photo += 1;?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="addPhoto('<?= $file ?>')">
                                <img src="/img/pack/<?= $file ?>" width="75px">
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <?php $count = 0;?>
    <?php elseif ($min == $max):?>
            <div class="col-lg-1">
                <table class="table table-bordered">
                    <tr>
                        <td>
                            <center><?= $number_photo?></center>
                            <?php $number_photo += 1;?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="addPhoto('<?= $file ?>')">
                                <img src="/img/pack/<?= $file ?>" width="75px">
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    <?php endif;?>
<?php endforeach;?>

</div> 
</div>
</div>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="modal-content">
      привет

    </div>
  </div>
</div>
<script type="text/javascript">
    function addPhoto(file){
        var div = document.getElementById('modal-content');
        div.innerHTML = '<center><img src="/img/pack/'+file+'""></center>';
    }
</script>