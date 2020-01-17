<h1>Browse our Products</h1>
<div>
    <form method="GET">
    <ul style="list-style-type:none;">
        <!-- hidden fields for controller and action location -->
        <input type="hidden" name="c" value="products">
        <input type="hidden" name="a" value="products">
        <li>
            <label for="productName">NameSearchfield</label>
            <input type="text" name="productName" id="productName" placeholder="Product Name">
        </li>
        <li> 
            <select name="cat">
                <option value="">--Select a Category--</option>
                <?=printFilterOptions($categories, 'name', 'cat')?>
            </select>
        </li>
        <li> 
            <select name="color">
                <option value="">--Select a Color--</option>
                <?=printFilterOptions($colors,'color','color')?>
            </select>
        </li>
        <!-- <li>
            <label for="maxPrice">Max Price</label>
            <input type="number" id="maxPrice" min="1" max="99999" step="1" name="maxPrice" default>
        </li> -->
        <li>
            <select name="brand">
                <option value="">--Select a Brand--</option>
                <?=printFilterOptions($brands, 'brand', 'brand')?>
            </select>
        </li>
    <!-- <li>
            <label for="maxPrice">Max Price</label>
            <input type="number" id="maxPrice" min="1" max="99999" step="1" name="maxPrice" default>
        </li> -->
        <li>
            <button type="submit" name="submit">Filter Now</button>
        </li>
    </ul>
    </form>
    <a href="index.php?c=products&a=products"><button>Reset Filters</button></a>
</div>
<? if(!empty($products)) : ?>
    <? foreach($products as $product) : ?>
        
        <a href="index.php?c=products&a=showProduct&productID=<?=product['id']?>">
        <div class="products">
        <img src="<?=$product['image']['imageUrl'] ?? ''?>" alt="<?= $product['image']['altText'] ?? ''?>">
        <div>
            <?=$product['name']?> only <?=$product['price'] ?> &euro;
        </div></br>
        </div></a>
    <? endforeach; ?>
<? else : ?> 
    <div><h2>No results found...</h2></div>
<? endif; ?>