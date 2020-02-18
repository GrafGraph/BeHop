<h1 class="headline form-background">&raquo;<?=$product['name']?>&laquo;</h1>
<section class="form-background">
        <div class="form-wrap">
            <div class="account-form">
            <? if(isset($errors)) : 
                foreach($errors as $error) : ?>
                    <div class="error">
                        <?=$error?>
                    </div>
                <? endforeach;
            endif;?>
                <? if(isset($success) && !empty($success)) :?>
                    <div class="success"><?=$success?></div>
                <? endif;?>
                <div class="container-wrap">
                    <div class="showProduct-item img-hover-zoom">
                        <img class="showProductImage" src="<?=$images[0]['imageUrl']?>" alt="<?=$images[0]['imageAltText']?>">
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
                        <p><strong>In Stock:</strong>
                            <? if($product['numberInStock'] <= 0):?>
                                    <strong class="priceNew">SOLD OUT</strong>
                            <? else: ?>
                                    <?=$product['numberInStock']?>
                            <? endif;?>
                        </p>

                        <p><strong>Description:</strong></br>
                        <q><?=$product['description']?></q></p>
                        </br>
                        <form method="POST" style="margin:1%; max-width:152px;">
                            <label style="display:inline;" for="quantity"><strong>Amount:</strong></label>
                            <input style="width:77px;" type="number" name="quantity" min="1" max=<?=$product['numberInStock']?> value="1">
                            <br>
                            <button type="submit" name="addToCartSubmit"
                                <? if($product['numberInStock'] <= 0):?>
                                     class="disabled" disabled>
                                    <strong class="priceNew">SOLD OUT</strong>
                                <? else:?>
                                    >Add to Cart
                                <? endif;?>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
</section>