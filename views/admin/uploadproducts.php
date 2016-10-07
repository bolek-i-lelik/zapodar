<?php
/*foreach ($offers as $offer){
print($offer->id.' - '.$offer->available.' - '. $offer->url.'<br>');
}*/
//var_dump($offers->offer[2]);
$a=1;
foreach ($offers->offer as $offer) {
	echo $a.'<br>';
	echo $offer['available'].'<br>';
	echo $offer['id'].'<br>';
	echo $offer->url.'<br>';
	echo $offer->price.'<br>';
	echo $offer->currencyId.'<br>';
	echo $offer->categoryId.'<br>';
	echo $offer->pickup.'<br>';
	echo $offer->delivery.'<br>';
	echo $offer->name.'<br>';
	echo $offer->vendoreCode.'<br>';
	echo $offer->description.'<br>';
	echo $offer->sales_notes.'<br>';
	echo $offer->vendorCode.'<br>';
	$fotos = '';
	foreach($offer->picture as $picture){
		$foto = substr($picture, 25);
		$fotos .= $foto.',';
	}
	echo $fotos.'<br>';
	print_r($offer->param);

	//print_r($offer);
	echo "<hr>";
	$a= $a+1;
}

?>