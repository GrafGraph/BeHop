<?php 
// Empty shoppingCart
if(empty($shoppingCartItems)) : ?>
    <div>
        <h2>Your Shopping Cart is Empty</h2>
        <? if(!isLoggedIn()) : ?>
        <p>Log in to see your Shopping Cart</p>
        <? endif;?>
    </div>
<? else :
$priceTotal = 0.0;
$n = 0; // Counter for indexing the quantity submit
?>
<div>
    
    <form Method="POST">
        <? foreach($shoppingCartItems as $item) :
            $quantity = isset($_POST['submit'.$n]) ? htmlspecialchars($_POST['submit'.$n]) : htmlspecialchars($item['quantity']);
            $priceForPosition = $item['price'] * $quantity;
            $priceTotal +=  $priceForPosition;
            $imageUrl = $item['image']['imageUrl'];
            $imageAltText =$item['image']['altText'];?>
            <div>
                <a href="index.php?c=products&a=showProduct&productID=<?=$item['id']?>" style="max-width:80px;float:left;">
                <img src=<?=$imageUrl?> alt=<?=$imageAltText?> style="max-height:70px;max-width:70px;"></a>
                <p><?=$item['name']?>, <?=$item['color']?></p>
                <p><?=$item['price']?>&euro; x 
                <input type="number" name=<?="quantity".$n?> min="1" max=<?=$item['numberInStock']?> value=<?=$quantity?>> 
                = <?=$priceForPosition?>&euro;
                <label for="remove">Remove?</label>
                <input type="checkbox" name=<?="remove".$n?> id="remove"></p>
                <input type="hidden" name=<?="prodID".$n?> value=<?=$item['id']?>>
            </div><hr>
            <? $n++;?>
        <? endforeach;?>
        <input type="hidden" name="numberOfItems" value=<?=count($shoppingCartItems)?>>
        <button type="submit" name="submit">Save</button>
        <button type="reset" name="reset">Reset</button>
    </form>
</div>   
    <br><div><p>Total= <?=$priceTotal?>&euro;</p></div>
   <?if(isLoggedIn()) : ?>
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