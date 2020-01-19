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

// updates quantity of ShoppingCartItems or removes them if $_POST['submit'] on ShoppingCart is set
function updateShoppingCart()
{
    // Update Database
    if(isset($_POST['submit']) && isLoggedIn())
    {
        $userID = $_SESSION['userID'];
        // Which product was changed?
        for($n = 0; $n < $_POST['numberOfItems']; $n++)
        {	
            // Delete or change quantity?
            if(isset($_POST["remove".$n]) && !empty($_POST["remove".$n]))
            {
                $prodID = $_POST["prodID".$n];
                $shoppingCart = ShoppingCart::findOne('user_id = ' . $userID);
                $shoppingCartHasProducts = ShoppingCart_has_product::findOne('shoppingCart_id = '. $shoppingCart['id'].' and product_id = '.$prodID);
                // Delete shoppingCartHasProducts from Database
                $deletedShoppingCartHasProducts = new ShoppingCart_has_product($shoppingCartHasProducts);
                $deletedShoppingCartHasProducts->delete();
            }
            elseif(isset($_POST["quantity".$n]) && !empty($_POST["quantity".$n]))
            {
                $prodID = $_POST["prodID".$n];
                $shoppingCart = ShoppingCart::findOne('user_id = ' . $userID);
                $shoppingCartHasProducts = ShoppingCart_has_product::findOne('shoppingCart_id = '. $shoppingCart['id'].' and product_id = '.$prodID);
                // Update Quantity
                $shoppingCartHasProducts['quantity'] = htmlspecialchars($_POST["quantity".$n]);
                $updatedShoppingCart = new ShoppingCart_has_product($shoppingCartHasProducts);
                $updatedShoppingCart->save();
            }
            
        }
    }
    elseif(isset($_POST['submit']) && !isLoggedIn())
    {
        if(thereAreShoppingCartItemsInSession())
        {
            for($n = 0; $n < $_POST['numberOfItems']; $n++)
            {	
                // Update Session
                if(isset($_POST["remove".$n]) && $_POST["remove".$n] == true)
                {
                    // Delete shoppingCartItem from Session
                    $prodID = $_POST["prodID".$n];
                    $numberOfItemsInCart = count($_SESSION['shoppingCartItems']);
                    if($numberOfItemsInCart == 1)
                    {
                        unset($_SESSION['shoppingCartItems']);
                    }
                    else
                    {
                        for($i = 0; $i < $numberOfItemsInCart; $i++)
                        {
                            if(isset($_SESSION['shoppingCartItems'][$i]['product_id']) && $_SESSION['shoppingCartItems'][$i]['product_id'] === $prodID)
                            {
                                unset($_SESSION['shoppingCartItems'][$i]);
                                break;
                            }
                        }
                    }
                    
                }
                elseif(isset($_POST["quantity".$n]) && !empty($_POST["quantity".$n]))
                {
                    $prodID = $_POST["prodID".$n];
                    // Update Quantity
                    foreach($_SESSION['shoppingCartItems'] as &$shoppingCartItem)
                    {
                        if($shoppingCartItem['product_id'] === $prodID)
                        {
                            $shoppingCartItem['quantity'] = $_POST["quantity".$n];
                            break;
                        }
                    }
                }
            }
        }
    }
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