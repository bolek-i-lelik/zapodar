<?php
foreach ($categories as $category){
print($category->id.' - '.$category->parent.' - '. $category->name.'<br>');
}

?>