<h1 class="center">Browse our Products</h1>
<section>
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
                <label for="minPrice">Min-Price</label>
                <!-- TODO: Create it more intuitive -->
                <input type="number" id="minPrice" min="0" max=<?=$maxPrice?> step="1" name="minPrice">
                <label for="maxPrice">Max-Price</label>
                <input type="number" id="maxPrice" min="1" max="99999" step="1" name="maxPrice">
            </li>
        </ul>
        <ul style="list-style-type:none;">
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
        </ul>
        <ul class="center" style="list-style-type:none;">
            <li>
                <select name="sortBy">
                    <option value="">--Sort By--</option>
                    <option value="newestFirst">Newest First</option>
                    <option value="oldestFirst">Oldest First</option>
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
    </ul>
    <ul class="center" style="list-style-type:none;">
        <li>
            <a href="index.php?c=products&a=products"><button>Reset Filters</button></a>
        </li>
    </ul>
</section>

<? if(!empty($products)) : ?>
    <div class="products">
        <? foreach($products as $product) : ?>
            <!-- TODO: Link nur auf Bild und namen? --> 
            <div class="product">
                <a class="productLink" href="index.php?c=products&a=showProduct&productID=<?=$product['id']?>">
                    <img class="productImage" src="<?=$product['image']['imageUrl'] ?? ''?>" alt="<?= $product['image']['altText'] ?? ''?>">
                    <div class="productText">
                        <?=$product['name']?>
                        <br>
                        <span class="price">
                        <? if(isset($product['discountPrice'])) : ?>
                            <span style="text-decoration:line-through;"> <?=$product['price']?>&euro;</span>
                            <span style="color:red;">  <?=$product['discountPrice']?>&euro;</span>
                        <? else : ?> 
                            <?=$product['price']?> &euro;
                        <? endif;?>
                        </span>
                    </div>
                </a>
            </div>
        <? endforeach; ?>
    </div>
<? else : ?> 
    <div>
        <h2>No results found...</h2>
    </div>
<? endif; ?>