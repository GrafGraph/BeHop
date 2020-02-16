<div class="product-wrap">   
    <h1 class="headline">&raquo;<?=$product['name']?>&laquo;</h1>
    <div class="container-nowrap">
        <div class="showProduct-item">
            <img class="productImage" src="<?=$images[0]['imageUrl']?>" alt="<?=$images[0]['imageAltText']?>">
        </div>
        <div class="showProduct-item">
            <p><strong><?=$product['name']?></strong></p>
            <p> 
                <?if(isset($product['discountPrice'])) : ?>
                    <span class="price priceOld"> <?=$product['price']?>&euro;</span>
                    <span class="price priceNew">  <?=$product['discountPrice']?>&euro;</span>
                <? else : ?>  
                    <span class="price"><?=$product['price']?> &euro;</span>
                <? endif;?>
            </p>
            <p><strong>Color:</strong> <?=$product['color']?></p>
            <p><strong>In Stock:</strong> <?=$product['numberInStock']?></p>

            <p><strong>Description:</strong></br>
            <q><?=$product['description']?></q></p>
            </br>
            <form method="POST">
                <label class="inline" for="quantity"><strong>Amount:</strong></label>
                <input type="number" name="quantity" min="1" max=<?=$product['numberInStock']?> value="1">
                <br>
                <button type="submit" name="addToCartSubmit">Add to Cart</button>
            </form>
        </div>
    </div>
</div>