<h1 class="center">&raquo;<?=$product['name']?>&laquo;</h1>

<div style="float:left; width:50%;">
    <img src="<?=$images[0]['imageUrl']?>" alt="<?=$images[0]['imageAltText']?>">
</div>
<div style="float:right; width:50%;">
<p><?=$product['name']?></p>
<p>Color: <?=$product['color']?></p>
<p>In Stock: <?=$product['numberInStock']?></p>
<p> <?if(isset($product['discountPrice'])) : ?>
    <span class="priceOld"> <?=$product['price']?>&euro;</span>
    <span class="priceNew">  <?=$product['discountPrice']?>&euro;</span>
    <? else : ?> <?=$product['price']?> &euro;
    <? endif;?></p>
<p>Description:</br>
<q><?=$product['description']?></q></p>
</br>
<form method="POST">
    <label for="quantity">Amount:</label>
    <input type="number" name="quantity" min="1" max=<?=$product['numberInStock']?> value="1">
    <button type="submit" name="submit">Add to Cart</button>
</form>
</div>