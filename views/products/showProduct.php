<h1>Sie interessieren sich also für &raquo;<?=$product['name']?>&laquo;</h1>

<div style="float:left; width:50%">
    <img src="<?=$images[0]['imageUrl']?>" alt="<?=$images[0]['imageAltText']?>">
</div>
<div style="float:right; width:50%">
<p><?=$product['name']?></p>
<p>Color: <?=$product['color']?></p>
<p>In Stock: <?=$product['numberInStock']?></p>
<p><?=$product['price']?>&euro;</p>
<p>Description:</br>
<q><?=$product['description']?></q></p>
</br>
<form method="POST">
    <label for="quantity">Amount:</label>
    <input type="number" name="quantity" min="1" max=<?=$product['numberInStock']?> value="1">
    <button type="submit" name="submit">Add to Cart</button>
</form>
</div>