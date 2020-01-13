<h1>Sie interessieren sich also für &raquo;<?=$product['name']?>&laquo;</h1>

<div style="float:left; width:50%">
    <img src="<?=$images[0]['imageUrl']?>" alt="<?=$images[0]['imageAltText']?>">
</div>
<div style="float:right; width:50%">
<p><?=$product['name']?></p>
<p>Farbe: <?=$product['color']?></p>
<p>Vorrätig: <?=$product['numberInStock']?></p>
<p><?=$product['price']?>&euro;</p>
<p>Beschreibung:</br>
<q><?=$product['description']?></q></p>
</br>
<form method="POST">
    <label for="quantity">Anzahl:</label>
    <input type="number" name="quantity" min="1" max=<?=$product['numberInStock']?> value="1">
    <button type="submit" name="submit">Zum Warenkorb hinzufügen</button>
</form>
</div>