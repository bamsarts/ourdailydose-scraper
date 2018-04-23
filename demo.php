<?php
$html = file_get_contents('https://ourdailydose.net/men/shoes.html'); //get the html returned from the following url

$pokemon_doc = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

if(!empty($html)){ //if any html is actually returned

	$pokemon_doc->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html
	
	$pokemon_xpath = new DOMXPath($pokemon_doc);

	$imageShoes = $pokemon_xpath->query('//div[@class="img-product"]/a/img');

	$priceShoes = $pokemon_xpath->query('//div[@class="product-info"]');
	print_r($priceShoes);

	if($imageShoes->length > 0){
		
		foreach ($imageShoes as $key) {
			$img_src = $key->getAttribute('src');
			$alt = $key->getAttribute('alt');
			echo "<h6>".$alt."</h6>";
			echo "<img src=".$img_src." style='width: 300; height: 380;'></br>";
		}
			
	}

}
?>