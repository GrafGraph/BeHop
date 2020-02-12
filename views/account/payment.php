<section class="center">
    <h1>Payment</h1>
    <? if($paymentMethod == "paypal") : ?>
        <img src="assets/images/checkout/PayPalLogo.png" alt="PayPal Logo" class="payPalLogo">
        <div>
            Pay <?=$priceTotal?>&euro; now:
        </div>
    <? endif;?>
    <form method="POST" action="?c=account&a=checkout">
        <button type="submit" name="paid">Pay Now</button>
    </form>
    <form method="POST" action="?c=account&a=checkout">
        <button type="submit" name="submit">Cancel</button>
    </form>
</section>
