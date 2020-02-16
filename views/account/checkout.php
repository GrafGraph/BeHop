<? if($step === 1) : ?>
    <h1 class="center form-background">Checkout</h1>
    <section class="center form-background">
        <div class="form-wrap">
            <div class="account-form">
                <h2>Step 1 of 2: Confirm your Information</h2>
                <div>
                    <table class="table-confirm">
                    <tr>
                        <td><strong>First Name:</strong></td>
                        <td><?=$user['firstName']?></td>
                    </tr>
                    <tr>
                        <td><strong>Last Name:</strong></td>
                        <td><?=$user['lastName']?></td>
                    </tr>
                    <tr>
                        <td><strong>Email:</strong></td>
                        <td><?=$user['email']?></td>
                    </tr>
                    <tr>
                        <td><strong>Address:</strong></td>
                        <td><?=$address['street'] .' '. $address['number']?><br>
                            <?=$address['zip'] .' '. $address['city']?>
                        </td>
                    </tr>
                    </table>
                </div>
                <div class="center">
                    <a href="index.php?c=account&a=account"><button>Change Information</button></a>
                    <form method="POST">
                        <input type="hidden" name="priceTotal" value=<?=$priceTotal?>>
                        <button type="submit" name="confirmedInformationSubmit">Continue</button>
                    </form>
                </div> 
            </div>
            <br>
        </div>
    </section>
<? elseif($step === 2) : ?>
    <h1 class="center form-background">Checkout</h1>
    <section class="center form-background">
        <div class="form-wrap">
            <div class="account-form">
                <h2>Step 2 of 2: Payment</h2>
                <h2>Select Payment Method</h2>
                <form method="POST" action="?c=account&a=payment">
                    <div>
                        <!-- TODO: Required machen -->
                        <label class="inline checkout-label" for="paypal">PayPal</label>
                        <input type="radio" name="paymentMethod" value="paypal" id="paypal" checked="checked">
                    <div>
                        <label class="inline checkout-label" for="transfer">Transfer</label>
                        <input type="radio" name="paymentMethod" value="transfer" id="transfer" disabled>
                    </div>
                    <div>
                        <label class="inline checkout-label" for="purchaseOnAccount">Purchase on Account</label>
                        <input type="radio" name="paymentMethod"value="purchaseOnAccount" id="purchaseOnAccount" disabled>
                    </div>
                    <p class="price">Total: <?=$priceTotal?>&euro;</p>
                    <div>
                        <input type="hidden" name="priceTotal" value=<?=$priceTotal?>>
                        <button type="submit" name="placeOrderSubmit">Place Order</button>
                    </div>
                </form>
            </div>
        </div>
        <br> 
    </section>
<? elseif($step === 3) : ?>
    <h1 class="center">Checkout Complete</h1>
    <section class="banner">
        <a href="index.php?c=products&a=products">
        <img src="assets/images/checkout/thanksForYourOrder<?=random_int(1,3)?>.png" alt="Continue Shopping"></a>
    </section>
<? else : ?>
    <h1 class="center">Checkout</h1>
    <h2 class="center">OOPS... We could not find your Order...</h2>
<? endif; ?>