<?
namespace beHop;
// Routine for Updating Entries in a Users Shopping Cart. Needs Product-ID, Shoppingcart-ID and selected quantity.
// @author Michael Hopp

// Find existing shoppingCart_has_product Entry
$shoppingCart_has_product = ShoppingCart_has_product::findOne(
    'shoppingCart_id = '.$shoppingCart['id'].' and product_id ='.$product['id']);
if(!empty($shoppingCart_has_product))	// Udate existing Entry
{
    $newQuantity = $shoppingCart_has_product['quantity'] + $quantity;
    if($newQuantity > $product['numberInStock'])    // New Quantity Higher than Stock allows?
    {
        $newQuantity = $product['numberInStock'];
        $this->_params['errors'][] = quantityExceededMaxInStockError($product['name']);
        $this->_params['success'] = "Added maximum of ".$product['numberInStock'];
    }
    // Create Updated Entry
    $shoppingCart_has_productData = [
        'id' => $shoppingCart_has_product['id'],
        'shoppingCart_id' => $shoppingCart['id'],
        'product_id' => $cartItem['product_id'],
        'quantity' => $newQuantity
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