<h1>Hier finden Sie bald unseren Warenkatalog</h1>
<?php 
$html = '';
foreach($products as $product)
{
    $imageUrl = $product['image']['imageUrl'] ?? '';
    $imageAltText = $product['image']['altText'] ?? '';
    $html .= 
    '<a href="index.php?c=products&a=showProduct&productID='. $product['id'].'">
    <div class="products">
    <img src="'. $imageUrl .'" alt="'. $imageAltText .'">'.
        '<div>'.
        $product['name']. ' nur '. $product['price']. '&euro;'.
        '</div></br>'.
    '</div></a>';
}
echo $html;
?>

