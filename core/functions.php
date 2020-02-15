<?php

const DEBUG =true;
// const ERROR =true;
 
function debug_to_logFile($message, $class = null)
{
    if(DEBUG){
        $class= ($class != null) ? $class:  '';
        $message = '['.(new DateTime())->format('Y-m-d H:i:s ').$class. ']' . $message. "\n";
        file_put_contents ( __DIR__.'/../logs/logs.txt', $message,FILE_APPEND);
    }
}

function isLoggedIn()
{
    $result = false;
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true)
    {
        $result = true;
    }
    return $result;
}

function thereAreShoppingCartItemsInSession()
{   
    $result = false;
    if(isset($_SESSION['shoppingCartItems']) && !empty($_SESSION['shoppingCartItems']))
    {$result = true;}
    return $result;
}

function getImagesToProductID($productID)
{
    return Image::find('product_id = ' . $productID);
}

// prints selected to display which filter option on products was used
function printSelectedIfSet($filterOption, $option)
{
    if(isset($_GET[$filterOption]) && $_GET[$filterOption] === $option) : ?>selected <? endif;
}

// Prints Content for Products Dropdown menu in Nav
function productsMenu()
{
    ?>
        <a class="priceNew" href="">Sale</a>
        <a href="">New In</a>
        Categories
        <a href="">Shoes</a>
        <a href="">Hoodies</a>
    <?
}
// Changes Nav Text-color if site is active
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

// Changes Nav color of Icon if site is active
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

// returns string, containing quantity of items and total price of shoppingcart for nav-display
function shoppingcartContent()
{
    $result ='';
    // Placeholder
    $result ='00';
    return $result;
}

// Calculate discountPrice for discount given in integer Percent and rounds up to second decimal
function calculateDiscountPrice($standardPrice, $discountInPercent)
{
    return round( ($standardPrice * (1 - ($discountInPercent / 100))), 2);
}

// filterOptions is array of possible options. attribute is needed key for filterOption
// Example: getFilterOptions($categories, 'name', 'cat');
function printFilterOptions($filterOptions, $attribute, $urlAttribute)
{
    foreach($filterOptions as $filterOption) : ?>

    <option value=<?=$filterOption[$attribute]?>
                <?// Remember which option was selected
				if(isset($_GET[$urlAttribute]) && $_GET[$urlAttribute] == $filterOption[$attribute]) : ?>
				selected
                <? endif; ?>
				>
                <?=$filterOption[$attribute]?></option>
    <? endforeach;
    // ------ Based on: ---------
    // foreach($categories as $category)
    // {
    // 		$html .= '<option value="'.$category['name'].'"';
    // 		if(isset($_GET['cat']) && htmlspecialchars($_GET['cat']) == $category)
    // 		{
    // 		   $html .=' selected ';
    // 		}
    // 		$html .= '>'.$category['name'].'</option>';
    // 
    
}
?>