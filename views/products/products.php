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
        <li>
            <select name="brand">
                <option value="">--Select a Brand--</option>
                <?=printFilterOptions($brands, 'brand', 'brand')?>
            </select>
        </li>
        <li>
            <select name="sale">
                <option value="">--Select a Sale--</option>
                <option value="all"
                <?printSelectedIfSet('sale','all');?>>All</option>
                <?=printFilterOptions($sales, 'name', 'sale')?>
            </select>
        </li>
        <li>
            <label for="minPrice">Min-Price</label>
            <!-- TODO: Create it more intuitive -->
            <input type="number" id="minPrice" min="0" max=<?=$maxPrice?> step="1" name="minPrice">
            <label for="maxPrice">Max-Price</label>
            <input type="number" id="maxPrice" min="1" max="99999" step="1" name="maxPrice">
        </li>
        <li>
            <select name="sortBy">
                <option value="">--Sort By--</option>
                <option value="priceAsc">Price Ascending</option>
                <option value="priceDesc">Price Descending</option>
                <option value="nameAsc">Name Ascending</option>
                <option value="nameDesc">Name Descending</option>
                <option value="color">Color</option>
                <option value="brand">Brand</option>
            </select>
        </li>
        <li>
            <button type="submit" name="submit">Filter Now</button>
        </li>
    </ul>
    </form>
    <a href="index.php?c=products&a=products"><button>Reset Filters</button></a>
</div>
<? if(!empty($products)) : ?>
<div>
    <? foreach($products as $product) : ?>
        <!-- TODO: Link nur auf Bild und namen? -->
        <a href="index.php?c=products&a=showProduct&productID=<?=$product['id']?>">
        <div class="products">
        <img src="<?=$product['image']['imageUrl'] ?? ''?>" alt="<?= $product['image']['altText'] ?? ''?>">
        <div>
            <?=$product['name']?> only <?=$product['price']?> &euro;
        </div></br>
        </div></a>
    <? endforeach; ?>
</div>
<? else : ?> 
    <div><h2>No results found...</h2></div>
<? endif; ?>