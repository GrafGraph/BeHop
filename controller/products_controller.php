<?php
namespace beHop;


class ProductsController extends Controller
{
	public function actionProducts()
	{
		$this->_params['title'] = 'BeHop - Products' ;

		// Filteroptions?
		$this->_params['categories'] = Category::findAttributes('name','id is not null');

		$this->_params['colors'] = Product::findAttributes('color','id is not null');
		$this->_params['brands'] = Product::findAttributes('brand','id is not null');

		// Which products to display
		$where = '';
		if(isset($_GET['cat']) || isset($_GET['productName']) || isset($_GET['color']) || isset($_GET['brand']) || isset($_GET['sale']) || isset($_GET['maxPrice']))
		{
			if(!empty($_GET['cat']))
			{
				$category = Category::findOne('name like "%'.htmlspecialchars($_GET['cat']).'%"');
				if(!empty($category['id']))
				$where .= ' category_id = '.$category['id'].' and';
				else
				{
					debug_to_logFile('$category["id"]) is empty!');
				}
			}
			if(!empty($_GET['productName']))
			{
				$where .= ' name like "%'.htmlspecialchars($_GET['productName']).'%" and';
			}
			if(!empty($_GET['color']))
			{
				$where .= ' color ="'.htmlspecialchars($_GET['color']).'" and';
			}
			if(!empty($_GET['brand']))
			{
				$where .= ' brand like "%'.htmlspecialchars($_GET['brand']).'%" and';
			}
			if(!empty($_GET['sale']))
			{
				$where .= ' sales_id is not null and';
			}
			if(!empty($_GET['maxPrice']))
			{
				$where .= ' price <= '.htmlspecialchars($_GET['maxPrice']).' and';
			}
			// substr($where, 0, -4); // remove the last 4 chars-> ' and' // Not needed since we always add ' id is not null'
		}
		$where .= ' id is not null';
		
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
			$cartItem['product_id'] = $product['id'];
			$cartItem['quantity'] = $quantity;
			if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true)
			{
				// New Entry in table shoppingcart_has_product
				$shoppingCart = ShoppingCart::findOne('user_id = '.$_SESSION['userID']);
				$shoppingCart_has_productData = [
					'shoppingCart_id' => $shoppingCart['id'],
					'product_id' => $cartItem['product_id'],
					'quantity' => $quantity
				];
				$shoppingCart_has_product = new ShoppingCart_has_product($shoppingCart_has_productData);
				$shoppingCart_has_product->save();
			}
			elseif(isset($_SESSION['shoppingCartItems']) && !empty($_SESSION['shoppingCartItems']))
			{
				array_push($_SESSION['shoppingCartItems'], $cartItem);
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