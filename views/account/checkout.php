<h1>Checkout</h1>
<? if($step === 1) : ?>
    <h2>Step 1 of 2: Confirm your Information</h2>
    <!-- <h2>Your Information</h2> -->
    <div>
    <table class="smallTable">
    <tr>
        <td>First Name</td>
        <td><?=$user['firstName']?></td>
    </tr>
    <tr>
        <td>Last Name</td>
        <td><?=$user['lastName']?></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><?=$user['email']?></td>
    </tr>
    <tr>
        <td>Address</td>
        <td><?=$address['country'] . $address['street'] . $address['number'] 
        . $address['city'] . $address['zip']?></td>
    </tr>
    </table>
    <a href="index.php?c=account&a=account"><button>Change Information</button></a>
    </div>
    <div>
        <form method="POST">
            <input type="hidden" name="priceTotal" value=<?=$priceTotal?>>
            <button type="submit" name="submit">Continue</button>
        </form>
    </div>
<? elseif($step === 2) : ?>
    <h2>Step 2 of 2: Payment</h2>
    <h2>Select Payment Method</h2>
    <p>Total= <?=$priceTotal?>&euro;</p>
    <div>
        <form method="POST" action="?c=account&a=payment">
            <ul class="noDecoration">
                <!-- TODO: Required machen -->
                <li>
                    <!-- <label for="paypal">PayPal</label> -->
                    <input type="radio" name="paymentMethod" value="paypal" id="paypal" checked="checked">PayPal
                </li>
                <li>
                    <!-- <label for="transfer">Transfer</label> -->
                    <input type="radio" name="paymentMethod" value="transfer" id="transfer" disabled>Transfer
                </li>
                <li>
                    <!-- <label for="purchaseOnAccount">Purchase on Account</label> -->
                    <input type="radio" name="paymentMethod"value="purchaseOnAccount" id="purchaseOnAccount" disabled>Purchase on Account
                </li>
            </ul> 
            <br>
            <div>
            <input type="hidden" name="priceTotal" value=<?=$priceTotal?>>
            <button type="submit" name="placeOrder">Place Order</button>
            </div>
        </form>
    </div>
<? elseif($step === 3) : ?>
    <section class="banner">
        <a href="index.php?c=products&a=products">
        <img src="assets/images/checkout/thanksForYourOrder<?=random_int(1,3)?>.png" alt="Continue Shopping"></a>
    </section>
<? else : ?>
    <h2>OOPS... We could not find your Order...</h2>
<? endif; ?>