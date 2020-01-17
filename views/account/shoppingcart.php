<h1>Mein Warenkorb</h1><hr>
<?php 
// Empty shoppingCart
if(empty($shoppingCartItems)) : ?>
    <div>
        <h2>Your Shopping Cart is Empty</h2>
        <p> Log in to see your Shopping Cart</p>
    </div>
<? else :
$priceTotal = 0.0;
foreach($shoppingCartItems as $item) :
    $priceForPosition = $item['price'] * $item['quantity'];
    $priceTotal +=  $priceForPosition;
    $imageUrl = $item['image']['imageUrl'];
    $imageAltText =$item['image']['altText'];?>
    <div>
        <a href="index.php?c=products&a=showProduct&productID=<?=$item['id']?>" style="max-width:80px;float:left;">
        <img src=<?=$imageUrl?> alt=<?=$imageAltText?> style="max-height:70px;max-width:70px;"></a>
        <p><?=$item['name']?>, <?=$item['color']?></p>
        <p><?=$item['price']?>&euro; x <?=$item['quantity']?> = <?=$priceForPosition?>&euro;</p>
    </div><br><br><hr>
<? endforeach;?>
   <br><div><p>Total= <?=$priceTotal?>&euro;</p></div>
   <?if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) : ?>
    <div>
        <form action="index.php?c=account&a=checkout" method="POST">
            <input type="hidden" name="priceTotal" value=<?=$priceTotal?>>
            <input type="submit" name="checkout" value="Proceed to Checkout">
       </form>
    </div>
<? 
    // TODO: Not logged in -> Checkout leads to Login?
    // Checkout button is unavailable until login
   else : ?>
        <div><p>Log in to Checkout</p></div>
        <div><button title="Log in to be able to check out" disabled>Checkout</button></div>
   <? endif;
endif;?>