<?php
$a = 0;
foreach ($xml->category as $cat){
print($cat['id'].' - '.$cat['parentId'].' - '. $cat.'<br>');
}

?>