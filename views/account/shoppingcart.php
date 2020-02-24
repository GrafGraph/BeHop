<h1 class="headline form-background">My Shopping Cart</h1>
<section class="form-background fullheight">
<?php 
if(empty($shoppingCartItems)) : ?>  <!-- Empty shoppingCart -->
    <div class="center">
        <h2>Your Shopping Cart is Empty</h2>
        <? if(!isLoggedIn()) : ?>
            <div>
                <a href="index.php?c=account&a=login">
                    <button title="Log in to be able to check out">Log in to see your Shopping Cart</button>
                </a>
            </div>
        <? endif;?>
    </div>
<? else :
        if(isset($errors)) : // Print Errors
            foreach($errors as $error) : ?>
                <div class="error">
                    <?=$error?>
                </div>
            <? endforeach;
        endif;?>
    <div class="form-wrap"> <!-- Left and right border -->
        <div class="shoppingcart-container-outer">  <!-- Outer Flex Container for Items -->
            <section class="shoppingcart-form" id="form-shoppingcart">
                <? foreach($shoppingCartItems as $item) :
                    $quantity = isset($_POST['quantity'.strval($item['id'])]) ? $_POST['quantity'.strval($item['id'])] : $item['quantity'];
                    $itemPrice = isset($item['discountPrice']) ? $item['discountPrice'] : $item['price'];
                    $imageUrl = $item['image']['imageUrl'];
                    $imageAltText =$item['image']['altText'];?>
                        <div class="shoppingcart-container-inner" id=<?=$item['id']?>> <!-- Inner Flex Container for Image and Text -->
                            <div class="img-hover-zoom">
                                <a href="index.php?c=products&a=showProduct&productID=<?=$item['id']?>">
                                    <img class="shoppingcartProductImage" src=<?=$imageUrl?> alt=<?=$imageAltText?>>
                                </a>
                            </div>
                            <div class="shoppingcart-item-right">  
                                <div id="name">
                                    <?=$item['name']?>, <?=$item['color']?>
                                    <form method="POST" class="shoppingcart-remove" action="?c=account&a=shoppingcart">
                                        <button type="submit" name=<?="remove".strval($item['id'])?> onclick="remove(this,<?=$item['id']?>)" class="shoppingCartDelete">X</button>
                                    </form>
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
                                    <form method="POST" action="?c=account&a=shoppingcart">
                                        Quantity: 
                                        <input type="number" name=<?="quantity".strval($item['id'])?> min=1 max=<?=$item['numberInStock']?> value=<?=$quantity?>>
                                        <button type="submit" name=<?="update".strval($item['id'])?> style="width:60px;">Save</button>
                                    </form> 
                                </div>
                                <div>
                                    Sum: <span class="price"><?=$item['priceForPosition']?>&euro;</span>
                                </div>
                            </div>
                        </div>
                <? endforeach;?>
        </section>
            <div class="shoppingcart-checkout">  
                <div>
                    <p class="total">Total</p>
                    <p class="price" id="priceTotal"><?=$_SESSION['priceTotal']?>&euro;</p>
                </div>
                <?if(isLoggedIn()) : ?>
                    <div>
                        <form action="index.php?c=account&a=checkout" method="POST">
                            <input type="submit" name="checkoutSubmit" value="Proceed to Checkout">
                        </form>
                    </div>
                <? else : ?>
                        <div>
                            <a href="index.php?c=account&a=login">
                                <button title="Log in to be able to check out">Log in to Checkout</button>
                            </a>
                        </div>
                <? endif;?>
            </div>
        </div> 
    </div>
<?endif;?>
</section>
<script src="assets/js/shoppingcart.js"></script>