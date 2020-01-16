<h1>Browse our Products</h1>
<div>
    <form method="GET">
    <ul style="list-style-type:none;">
    <!-- hidden fields for controller and action location -->
        <input type="hidden" name="c" value="products">
        <input type="hidden" name="a" value="products">   
        <!-- <li>
            <label for="productName">NameSearchfield</label>
            <input type="text" name="productName" id="productName" placeholder="Product Name">
        </li> -->
        <li>
            <select name="cat">
                <option value="Pants">Pants</option>
                <option value="Shoes">Shoes</option>
            </select>
        </li>
        <li> 
            <select name="color">
            <option value="White">White</option>
            <option value="Black">Black</option>
            </select>
        </li>
        <li>
        <label for="maxPrice">Max Price</label>
        <input type="number" id="maxPrice" min="1" max="99999" step="1" name="maxPrice">
        </li>
        <!-- <li>
            <select name="brand">
                <option value="Jordan">Jordan</option>
                <option value="BeHop">BeHop</option>
            </select>
        </li> -->

        <li>
        <button type="submit" name="submit">Filter Now</button>
        </li>
    </ul>
        
    </form>
</div>
<?php 
$html = '';
if(!empty($products))
{
    foreach($products as $product)
    {
        $imageUrl = $product['image']['imageUrl'] ?? '';
        $imageAltText = $product['image']['altText'] ?? '';
        $html .= 
        '<a href="index.php?c=products&a=showProduct&productID='. $product['id'].'">
        <div class="products">
        <img src="'. $imageUrl .'" alt="'. $imageAltText .'">'.
            '<div>'.
            $product['name']. ' only '. $product['price']. '&euro;'.
            '</div></br>'.
        '</div></a>';
    }
}
else
{
    $html .= '<div><h2>No results found...</h2></div>';
}

echo $html;
?>


