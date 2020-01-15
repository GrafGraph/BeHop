<h1>Mein Warenkorb</h1><hr>
<?php 
$html = '';
// Empty shoppingCart
if(empty($shoppingCartItems))
{
    $html .=    '<div>
                    <h2>Dein Warenkorb ist Leer</h2>
                    <p> Melde dich an um deinen Warenkorb zu sehen und nach Produkten zu suchen!</p>
                </div>';
}

else
{
    $priceTotal = 0.0;

   foreach($shoppingCartItems as $item)
   {
       $priceForPosition = $item['price'] * $item['quantity'];
       $priceTotal +=  $priceForPosition;
       $imageUrl = $item['image']['imageUrl'];
       $imageAltText =$item['image']['altText'];

       $html .= 
       '<div>
           <a href="index.php?c=products&a=showProduct&productID='. $item['id'].'" style="max-width:80px;float:left;">
           <img src="'.$imageUrl.'" alt="'.$imageAltText.'" style="max-height:70px;max-width:70px;"></a>
           <p>'.$item['name'].', '.$item['color'].'</p>
           <p>'.$item['price'].'&euro; x '.$item['quantity'].' = '.$priceForPosition.'&euro;</p>
       </div><br><br><hr>';
   }
    
   $html .= '<br><div><p>Total: '.$priceTotal.'&euro;</p></div>';
   if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true)
   {
       $html .= '<div><form action="index.php?c=account&a=checkout" method="POST">
       <input type="hidden" name="priceTotal" value='.$priceTotal.'>
       <input type="submit" name="checkout" value="Proceed to Checkout"></form></div>';
   }
    // TODO: Not logged in -> Checkout leads to Login?
    // Checkout button is unavailable until login
   else
   {
       $html .= '<div><p>Melde dich an um zum Checkout zu gelangen</p></div>';
       $html .= '<div><button title="Log in to be able to check out" disabled>Checkout</button></div>';
   }
}
echo $html;
?>