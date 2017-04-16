<a class="btn btn-primary" href="/categorys/create/">Создать новую</a><hr/>
<?php foreach ($categorys as $category):?>
		<p><a href="#" onclick="getChildCategory(<?= $category['id'] ?>)"><b><?= $category['name'] ?></b></a> <a href="/categorys/update?id=<?= $category['id'] ?>" style="text-decoration: none; color: blue;"><u>редактировать</u></a> <a href="#" data-toggle="modal" data-target="#myModal" onclick="changeParent(<?= $category['id'] ?>)" style="text-decoration: none; color: orange;"><u>переместить</u></a></p>
		<div class="childCats" id="cat<?= $category['id'] ?>"></div>
<?php endforeach;?>