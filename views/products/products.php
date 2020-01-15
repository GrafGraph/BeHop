<h1>Hier finden Sie bald unseren Warenkatalog</h1>
<div>
    <form method="GET" action="index.php?c=products&a=products">
    <ul style="list-style-type:none;">        
        <!-- <li>
            <label for="productName">NameSearchfield</label>
            <input type="text" name="productName" id="productName" placeholder="Product Name">
        </li>
        <li>
            <select name="cat">
                <option value="Pants">Pants</option>
                <option value="Shoes">Shoes</option>
            </select>
        </li>  -->
        <li> 
            <select name="color">
            <option value="White">White</option>
            <option value="Black">Black</option>
            </select>
        </li>
           
        <!-- <li>
            <select name="brand">
                <option value="Jordan">Jordan</option>
                <option value="BeHop">BeHop</option>
            </select>
        </li> -->
        <li>
        <input type="submit" name="submit">
        </li>
    </ul>
        
    </form>
</div>
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

