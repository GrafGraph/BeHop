<h1 class="headline form-background">My Shopping Cart</h1>
<section class="form-background">
<?php 
// Empty shoppingCart
if(empty($shoppingCartItems)) : ?>
    <div class="center">
        <h2>Your Shopping Cart is Empty</h2>
        <? if(!isLoggedIn()) : ?>
            <div>
                <a href="index.php?c=account&a=login">
                    <button class="disabled" title="Log in to be able to check out">Log in to see your Shopping Cart</button>
                </a>
            </div>
        <? endif;?>
    </div>
<? else :
    $priceTotal = 0.0;
    ?>
    <div class="form-wrap">
        <div class="shoppingcart-container-outer">
            <form Method="POST" class="shoppingcart-form">
                <? foreach($shoppingCartItems as $item) :
                    $quantity = isset($_POST['submit'.strval($item['id'])]) ? htmlspecialchars($_POST['submit'.strval($item['id'])]) : htmlspecialchars($item['quantity']);
                    $itemPrice = isset($item['discountPrice']) ? $item['discountPrice'] : $item['price'];
                    $priceForPosition = $itemPrice * $quantity;
                    $priceTotal +=  $priceForPosition;
                    $imageUrl = $item['image']['imageUrl'];
                    $imageAltText =$item['image']['altText'];?>
                        <div class="shoppingcart-container-inner">
                            <div>
                                <a href="index.php?c=products&a=showProduct&productID=<?=$item['id']?>">
                                <img class="shoppingcartProductImage" src=<?=$imageUrl?> alt=<?=$imageAltText?>></a>
                            </div>
                            <div class="shoppingcart-item-right">  
                                <div>
                                    <?=$item['name']?>, <?=$item['color']?>
                                </div>
                                <div>     
                                    <? if(isset($item['discountPrice'])) : ?>
                                        <span class="priceOld price"><?=$item['price']?>&euro;</span>
                                        <span class="priceNew price"><?=$item['discountPrice']?>&euro;</span>
                                    <? else : ?>
                                        <span class="price"><?=$item['price']?> &euro;</span>
                                    <? endif;?>
                                </div> 
                                <div>
                                    Quantity: <input type="number" name=<?="quantity".strval($item['id'])?> min="1" max=<?=$item['numberInStock']?> value=<?=$quantity?>>
                                </div>
                                <div>
                                    Sum: <span class="price"><?=$priceForPosition?>&euro;</span>
                                </div>
                                <div>
                                    <label for="remove">Remove?</label>
                                    <input type="checkbox" name=<?="remove".strval($item['id'])?> id="remove">
                                </div>
                                <input type="hidden" name=<?="prodID".strval($item['id'])?> value=<?=$item['id']?>>
                            </div>
                        </div>
                <? endforeach;?>
                <input type="hidden" name="numberOfItems" value=<?=count($shoppingCartItems)?>>
                <div>
                    <button type="submit" name="updateShoppingcartSubmit">Save Changes</button>
                    <button type="reset" name="reset">Reset Changes</button>
                </div>
            </form>
            <!-- <form method="post">
                <div>
                    <button type="submit" name="clearShoppingcartSubmit">Clear Shopping Cart</button>
                </div>
            </form> -->
            <div class="shoppingcart-checkout">  
                <div>
                    <p class="total">Total</p>
                    <p class="price"><?=$priceTotal?>&euro;</p>
                </div>
                <?if(isLoggedIn()) : ?>
                    <div>
                        <form action="index.php?c=account&a=checkout" method="POST">
                            <input type="hidden" name="priceTotal" value=<?=$priceTotal?>>
                            <input type="submit" name="checkoutSubmit" value="Proceed to Checkout">
                        </form>
                    </div>
                <? else : ?>
                        <div>
                            <a href="index.php?c=account&a=login">
                            <button class="disabled" title="Log in to be able to check out">Log in to Checkout</button>
                            </a>
                        </div>
                <? endif;?>
            </div>
        </div> 
    </div>
<?endif;?>
</section>