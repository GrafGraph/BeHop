<?php
namespace beHop;


class ProductsController extends Controller
{
	public function actionProducts()
	{
		$this->_params['title'] = 'BeHop - Produkte' ;

		// TODO: IF: Falls Filteroptionen -> Aus Url filtern

		// Else: Show all products and their images
			$where = 'id is not null';
			$products = Product::find($where);	
			
			// Image to product...
			// TODO: Mehrere Images berücksichtigen. MainImage usw. 
			foreach($products as &$product)
			{
				$product['image'] = Image::findOne('product_id = ' . $product['id']);
			}
			$this->_params['products'] = $products;
	}

	public function actionShowProduct()
	{
		$product = Product::findOne('id = '. htmlspecialchars($_GET['productID']));
		$this->_params['title'] = 'Behop - '. $product['name'];
		$this->_params['images'] = Image::find('product_id = ' . $product['id']);
		$this->_params['product'] = $product;

		// Add to Cart-Routine
		if(isset($_POST['submit']))
		{
			$quantity = $_POST['quantity'];
			$cartItem = array();
			$cartItem['product_id'] = $product['id'];
			$cartItem['quantity'] = $quantity;
			if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true)
			{
				// New Entry in table shoppingcart_has_product
				$shoppingCart_id = ShoppingCart::findOne('user_id = '.$_SESSION['userID']);
				$shoppingCart_has_productData = [
					'shoppingCart_id' => $shoppingCart_id,
					'product_id' => $cartItem['product_id'],
					'quantity' => $cartItem['quantity']
				];
				$shoppingCart_has_product = new ShoppingCart_has_product($shoppingCart_has_productData);
				$shoppingCart_has_product->save();
			}
			elseif(isset($_SESSION['shoppingCartItems']) && !empty($_SESSION['shoppingCartItems']))
			{
				array_push($shoppingCartItems, $cartItem);
			}
			else
			{
				$_SESSION['shoppingCartItems'] = array($cartItem);
			}
		}
	}

	public function actionSales()
	{
		$this->_params['title'] = 'Behop - Sales';
	}
}