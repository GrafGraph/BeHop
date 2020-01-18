<h1>Checkout</h1>
<? if($step === 1) : ?>
    <h2>Step 1 of 3: Select Payment Method</h2>
    <h2>Your Information</h2>
    <div>
    <table style="width:30%">
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
    </div>
    <h2>Select Payment Method</h2>
    <p>Total= <?=$priceTotal?>&euro;</p>
        <form method="POST">
            <!-- TODO: Required machen -->
            <!-- TODO: Falls nur Paypal, dann immerhin ordentlich einbinden! -->
            <!-- <label for="paypal">PayPal</label> -->
            <input type="radio" name="paymentMethod" value="paypal" id="paypal"> PayPal <br>
            <!-- <label for="transfer">Transfer</label> -->
            <input type="radio" name="paymentMethod" value="transfer" id="transfer"> Transfer <br>

            <!-- <label for="purchaseOnAccount">Purchase on Account</label> -->
            <input type="radio" name="paymentMethod"value="purchaseOnAccount" id="purchaseOnAccount"> Purchase on Account <br>
            <div>
                <input type="hidden" name="priceTotal" value=<?=$priceTotal?>>
                <button type="submit" name="submit">Continue</button>
            </div>
        </form>
        
<? elseif($step === 2) : ?>
    <h2>Step 2 of 3: Confirm Order</h2>
    <h2>Your Information</h2>
    <div>
    <table style="width:30%">
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
    <p>Total= <?=$priceTotal?>&euro;</p>
    </div>
    <div>
        <form method="POST">
            <input type="hidden" name="priceTotal" value=<?=$priceTotal?>>
            <button type="submit" name="placeOrder">Place Order</button>
        </form>
    </div>
<? elseif($step === 3) : ?>
    <h2>Step 3 of 3: Creating Order</h2>
    <div>
        <p>Thank You!</p>
        <p>Your Order will be processed</p>
    </div>
<? else : ?>
    <h2>OOPS... We could not find your Order...</h2>
<? endif; ?>