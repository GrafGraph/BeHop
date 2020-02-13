<h1 class="center">Browse our Products</h1>
<div class="filter-wrap">
    <div>
        <form method="GET" style="text-align:center">

            <!-- hidden fields for controller and action location -->
            <input type="hidden" name="c" value="products">
            <input type="hidden" name="a" value="products">

    <!--    <label for="productName">NameSearchfield</label>
            <input type="text" name="productName" id="productName" placeholder="Product Name"> -->
            
            <div class="filter-item">
                <!-- <label for="minPrice">Min-Price</label> -->
                <!-- TODO: Create it more intuitive -->
                <input type="number" min="0" max=<?=$maxPrice?> step="1" name="minPrice" placeholder=" Min-Price...">
            </div>
            
            <div class="filter-item">
                <!-- <label for="maxPrice">Max-Price</label> -->
                <input type="number" min="1" max="99999" step="1" name="maxPrice" placeholder=" Max-Price...">
            </div>

            <div class="filter-item">
                <select name="cat">
                    <option value="">--Category--</option>
                    <?=printFilterOptions($categories, 'name', 'cat')?>
                </select>
            </div>

            <div class="filter-item">
                <select name="color">
                    <option value="">--Color--</option>
                    <?=printFilterOptions($colors,'color','color')?>
                </select>
            </div>

            <div class="filter-item">
                <select name="brand">
                    <option value="">--Brand--</option>
                    <?=printFilterOptions($brands, 'brand', 'brand')?>
                </select>
            </div>
            
            <div class="filter-item">
                <select name="sale">
                    <option value="">--Sale--</option>
                    <option value="all"
                    <?printSelectedIfSet('sale','all');?>>All</option>
                    <?=printFilterOptions($sales, 'name', 'sale')?>
                </select>
            </div>

            <div class="filter-item">
                <select name="sortBy">
                    <option value="">--Sort By--</option>
                    <option value="newestFirst"
                    <?printSelectedIfSet('sortBy','newestFirst');?>>Newest First</option>
                    <option value="oldestFirst"
                    <?printSelectedIfSet('sortBy','oldestFirst');?>>Oldest First</option>
                    <option value="priceAsc"
                    <?printSelectedIfSet('sortBy','priceAsc');?>>Price Ascending</option>
                    <option value="priceDesc"
                    <?printSelectedIfSet('sortBy','priceDesc');?>>Price Descending</option>
                    <option value="nameAsc"
                    <?printSelectedIfSet('sortBy','nameAsc');?>>Name Ascending</option>
                    <option value="nameDesc"
                    <?printSelectedIfSet('sortBy','nameDesc');?>>Name Descending</option>
                    <option value="color"
                    <?printSelectedIfSet('sortBy','color');?>>Color</option>
                    <option value="brand"
                    <?printSelectedIfSet('sortBy','brand');?>>Brand</option>
                </select>
            </div>
    </div>
        <div class="filter-buttons">
            <div class="filter-button">
                <button style="float:right;" type="submit" name="submit">Filter Now</button>
            </div>
        </form>
            <div class="filter-button">
                <a style="float:left;" href="index.php?c=products&a=products"><button>Reset Filters</button></a>
            </div>
        </div>
</div>

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
                            <span class="priceOld"> <?=$product['price']?>&euro;</span>
                            <span class="priceNew">  <?=$product['discountPrice']?>&euro;</span>
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