<h1>Payment</h1>
<? if($paymentMethod == "paypal") : ?>
    <img src="assets/images/checkout/PayPalLogo.png" alt="PayPal Logo" style="margin:15px;max-height:10em;">
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