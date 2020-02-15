<?
namespace behop;
    $shoppingCart = ShoppingCart::findOne('user_id = '.$_SESSION['userID']);
    // Find existing shoppingCart_has_product Entry
    $shoppingCart_has_product = ShoppingCart_has_product::findOne(
        'shoppingCart_id = '.$shoppingCart['id'].' and product_id ='.$product['id']);
    if(!empty($shoppingCart_has_product))	// Udate existing Entry
    {
        $shoppingCart_has_productData = [
            'id' => $shoppingCart_has_product['id'],
            'shoppingCart_id' => $shoppingCart['id'],
            'product_id' => $cartItem['product_id'],
            'quantity' => ($shoppingCart_has_product['quantity'] + $quantity)
            ];
    }
    else	// Create new Entry: id => null
    {
        $shoppingCart_has_productData = [
        'shoppingCart_id' => $shoppingCart['id'],
        'product_id' => $cartItem['product_id'],
        'quantity' => $quantity
        ];
    }
    $newShoppingCart_has_product = new ShoppingCart_has_product($shoppingCart_has_productData);
    $newShoppingCart_has_product->save();
?>