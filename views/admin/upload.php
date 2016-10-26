<?php
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <button>Загрузить</button>

<?php ActiveForm::end() ?>
<?php if($config_new->upoloadfoto == 0):?>
	<p>Загрузка изображений с удалённого сервера выключена. Вы можете включить её нажав на кнопку. Внимание: процесс обработки файла выгрузки может значительно затянуться. Для загрузки фото рекомендуется воспользоваться FTP.</p>
<button class="btn btn-success" onclick="upUploadFoto()">Включить загрузку фото</button>
<?php elseif($config_new['upoloadfoto'] == 1):?>
	<p>Внимание: включена загрузка изображений с удалённого сервера. Процесс обработки файла выгрузки может затянуться на неопределённое время. Если предполагается большое количество новых изображений, рекомендуем осуществить загрузку изображений по FTP. Для отключения загрузки изображений скриптом нажмите на кнопку ниже.</p>
<button class="btn btn-danger" onclick="downUploadFoto()">Выключить загрузку фото</button>
<?php endif;?>