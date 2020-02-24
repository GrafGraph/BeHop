<?php
const DEBUG = true;
 
// Debug Function for logging messages to textfile.
function debug_to_logFile($message, $class = null)
{
    if(DEBUG){
        $class= ($class != null) ? $class:  '';
        $message = '['.(new DateTime())->format('Y-m-d H:i:s ').$class. ']' . $message. "\n";
        file_put_contents ( __DIR__.'/../logs/logs.txt', $message,FILE_APPEND);
    }
}

// Checks whether or not Session has a logged in User.
// @author Michael Hopp
function isLoggedIn()
{
    $result = false;
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true)
    {
        $result = true;
    }
    return $result;
}

// Checks if Session contains Shoppingcart-Items.
// @author Michael Hopp
function thereAreShoppingCartItemsInSession()
{   
    $result = false;
    if(isset($_SESSION['shoppingCartItems']) && !empty($_SESSION['shoppingCartItems']))
    {$result = true;}
    return $result;
}

// TODO: Rebuild as Method of Image.class
// @author Michael Hopp
function getImagesToProductID($productID)
{
    return Image::find('product_id = ' . $productID);
}

// Prints 'selected' to display which filter option on products was used
// @author Michael Hopp
function printSelectedIfSet($filterOption, $option)
{
    if(isset($_GET[$filterOption]) && $_GET[$filterOption] === $option) : ?>selected <? endif;
}

// Prints Content for Products Dropdown menu in Nav. Needs Category-Array from controller, so it can be used on any site.
// @author Michael Hopp
function productsMenu($categories)
{
    ?>
        <div class="flex-container">
            <div class="flex-item">
                <a href="index.php?c=products&a=products&sale=all">Sale <span style="color:#ff5757">%</span></a>    <!-- Red '%' as Eyecatcher -->
                <a href="index.php?c=products&a=products&sortBy=newestFirst">New In</a>
            </div>
            <div class="flex-container-half">
                <div style="color:#ffffff; border-bottom: 1px solid #696969; text-align:left; width:90%;margin:2%;">
                    Categories
                </div>
                    <? foreach($categories as $category) : ?>
                        <div class="flex-item-half">
                             <a class="medium-dropdown-link" href="index.php?c=products&a=products&cat=<?=$category['name']?>">
                                <?=$category['name']?>
                            </a>
                        </div> 
                    <? endforeach; ?>      
            </div>    
        </div>    
    <?
}

// Changes Nav Text-color to beHop-Red if site is active
// @author Michael Hopp
function highlightNavText($action)
{
    $result = '';
    if(isset($_GET['a']) && htmlspecialchars($_GET['a']) === $action)
    {
        $result = '#ff5757';
    }
    else
    {
        $result = '#ffffff';
    }
    return $result;
}

// Changes Nav color of Icon if site is active. Needs two Images of each Icon with name-Endings 'Red' or 'White'.
// @author Michael Hopp
function highlightNavIcon($action)
{
    $result = '';
    if(isset($_GET['a']) && htmlspecialchars($_GET['a']) === $action)
    {
        $result = 'Red';
    }
    else
    {
        $result = 'White';
    }
    return $result;
}

// Returns string, containing quantity of items of shoppingcart for display next to Shoppingcart-Icon in Nav.
// @author Michael Hopp
function shoppingcartContent()
{
    $sum = 0;
    if(isLoggedIn())
    {
        $shoppingCart = beHop\Shoppingcart::findOne('user_id = '.$_SESSION['userID']);
        $shoppingCartEntries = beHop\ShoppingCart_has_product::find('shoppingCart_id = '.$shoppingCart['id']);
        foreach($shoppingCartEntries as $entry)
        {
            $sum += $entry['quantity'];
        }
    }
    elseif(thereAreShoppingCartItemsInSession())
    {
        foreach($_SESSION['shoppingCartItems'] as $entry)
        {
            $sum += $entry['quantity'];
        }
    }
    $result = strval($sum);
    return ($result<1000) ? $result : '999+';
}

// Returns array of Entries(Array) of Products in Shoppingcart from either Database or Session. Null if none are set.
// @author Michael Hopp
function getShoppingCartItems()
{
    $shoppingCartHasProducts = null;
    if(isLoggedIn())	// Get ShoppingCartItems from Database
    {
        $userID = $_SESSION['userID'];
        $shoppingCart = beHop\ShoppingCart::findOne('user_id = ' . $userID);
        $shoppingCartHasProducts = beHop\ShoppingCart_has_product::find('shoppingCart_id = '. $shoppingCart['id']);
    }
    elseif(thereAreShoppingCartItemsInSession())	// Shoppingcart from Session
    {
        $shoppingCartHasProducts = $_SESSION['shoppingCartItems'];
    }
    return $shoppingCartHasProducts;
}

// Returns the sum of prices of all products in users shoppingcart or session with applied discounts.
// @author Michael Hopp
function getTotalPrice(){
    $sum = 0.0;
    $shoppingCartProducts = getShoppingCartItems();
    if(!empty($shoppingCartProducts))
    {
        foreach($shoppingCartProducts as $OrderItem)
        {
            $product = beHop\Product::findOne('id = '. $OrderItem['product_id']);
            $price = $product['price'];
            if($product['sales_id'] !== null)	// Product in Sale
            {
                // Apply Discounts
                $sale = beHop\Sales::findOne('id ='.$product['sales_id']);
                $price = calculateDiscountPrice($product['price'], $sale['discountPercent']);
            }
            $sum += $price * $OrderItem['quantity'];
        }
    }
    return $sum;
}

// Calculate discountPrice for discount given in integer Percent and rounds up to second decimal.
// @author Michael Hopp
function calculateDiscountPrice($standardPrice, $discountInPercent)
{
    return round( ($standardPrice * (1 - ($discountInPercent / 100))), 2);
}

// Error Message for Quantity Errors in add-to-cart Routine
function quantityExceededMaxInStockError($name){
    return "Quantity selected for &raquo;".$name."&laquo; exceeded Maximum in Stock.";
}

// Prints Filteroptions for Products.
// filterOptions is array of possible options (from Database). attribute is the value for filterOption
// Example: getFilterOptions($categories, 'name', 'cat'); -> Prints the Names of Categories as Options for
// a HTML select and adds 'selected' if the URL contains 'cat=name'.
// @author Michael Hopp
function printFilterOptions($filterOptions, $attribute, $urlAttribute)
{
    foreach($filterOptions as $filterOption) : ?>
    <option value=<?=$filterOption[$attribute]?>
                <?// Remember which option was selected
                printSelectedIfSet($urlAttribute, $filterOption[$attribute]);?>
				>
                <?=$filterOption[$attribute]?></option>
    <? endforeach;
}
?>