<?php
namespace beHop;


class ProductsController extends Controller
{
	public function actionProducts()
	{
		$this->_params['title'] = 'BeHop - Products' ;

		// Load available Filteroptions from Database
		$this->_params['categories'] = Category::findAttributes('name','id is not null');
		$this->_params['colors'] = Product::findAttributes('color','id is not null');
		$this->_params['brands'] = Product::findAttributes('brand','id is not null');
		$maxPrice =  Product::getMinOrMaxPrice('MAX');
		$this->_params['maxPrice'] = ceil($maxPrice['price']);
		$minPrice = Product::getMinOrMaxPrice('MIN');
		$this->_params['minPrice'] = floor($minPrice['price']);
		$this->_params['sales'] = Sales::findAttributes('name', 'id is not null');

		// TODO: catch MaxPrice lower than MinPrice 
		// if(!((isset($_GET['maxPrice']) && isset($_GET['minPrice'])) && (htmlspecialchars($_GET['maxPrice']) < htmlspecialchars($_GET['minPrice']))))
		// {


		// Which products to display regarding filters
		$where ='';	
		// Searchbar-Filters
		if(isset($_GET['search']) && !empty($_GET['search']))
		{
			$searchFilters = explode ('+',htmlspecialchars($_GET['search']));
			foreach($searchFilters as $searchFilter)
			{
				$category = Category::findOne('name like "%'.$searchFilter.'%"');
				if(!empty($category['id']))
				{
					$where .= ' category_id = '.$category['id'].' or';
				}
				$where .= ' name like "%'.$searchFilter.'%" or';
				$where .= ' brand like "%'.$searchFilter.'%" or';
				$where .= ' color like "%'.$searchFilter.'%" or';
			}
			$where = substr($where, 0, -3); // remove the last 3 chars-> ' or'
			$where .= ' and';
		}
		// Url-Filters
		if(isset($_GET['cat']) || isset($_GET['productName']) || isset($_GET['color']) || isset($_GET['brand']) || isset($_GET['sale']) || isset($_GET['maxPrice']))
		{
			if(!empty($_GET['cat']))
			{
				$category = Category::findOne('name = "'.htmlspecialchars($_GET['cat']).'"');
				if(!empty($category['id']))
				$where .= ' category_id = '.$category['id'].' and';
				// else
				// {
				// 	debug_to_logFile("{$category[i]} is empty!");
				// }
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
				$where .= ' brand like "'.htmlspecialchars($_GET['brand']).'" and';
			}
			if(!empty($_GET['sale']))
			{
				if($_GET['sale'] === 'all')
				{
					$where .= ' sales_id is not null and';
				}
				else
				{
					$sales = Sales::findOne('name = "'.htmlspecialchars($_GET['sale']).'"');
					$where .= ' sales_id ='. $sales['id']. ' and';
				}
			}
			if(!empty($_GET['maxPrice']))
			{
				$where .= ' price <= '.htmlspecialchars($_GET['maxPrice']).' and';
			}
			if(!empty($_GET['minPrice']))
			{
				$where .= ' price >= '.htmlspecialchars($_GET['minPrice']).' and';
			}
		}
		$where .= ' id is not null';
		
		if(isset($_GET['sortBy']) && !empty($_GET['sortBy']))
		{
			$descending = false;
			switch($_GET['sortBy'])
			{
				case "priceAsc": 
					$sortBy = "price";
				break;
				case "priceDesc":
					$sortBy = "price";
					$descending = true;
				break;
				case "nameAsc":
					$sortBy = "name";
				break;
				case "nameDesc":
					$sortBy= "name";
					$descending = true;
				case "color":
					$sortBy = "color";
				break;
				case "brand":
					$sortBy = "brand";
				break;
				case "newestFirst":
					$sortBy = "createdAt";
					$descending = true;
				break;
				case "oldestFirst":
					$sortBy = "createdAt";
				break;
				default:
					$sortBy = "id";
			}
			$products = Product::findSorted($sortBy, $where, $descending);
		}
		else
		{
			$products = Product::find($where);	
		}
		
		// Image and Discount to Product...
		// TODO: Mehrere Images berücksichtigen. MainImage usw. 
		foreach($products as &$product)
		{
			$product['image'] = Image::findOne('product_id = ' . $product['id']);

			if($product['sales_id'] !== null)	// Product in Sale
			{
				// Apply Discounts
				$sale = Sales::findOne('id ='.$product['sales_id']);
				$product['discountPrice'] = calculateDiscountPrice($product['price'], $sale['discountPercent']);
			}
		}
		$this->_params['products'] = $products;
		// }
		// else
		// {
		// 	$this->_params['priceError'] = 'Max Price must be higher than Min Price...';
		// }
	}

	public function actionShowProduct()
	{
		$product = Product::findOne('id = '. htmlspecialchars($_GET['productID']));
		$this->_params['title'] = 'Behop - '. $product['name'];
		$this->_params['images'] = Image::find('product_id = ' . $product['id']);
		if($product['sales_id'] !== null)	// Product in Sale
		{
			// Apply Discount
			$sale = Sales::findOne('id ='.$product['sales_id']);
			$product['discountPrice'] = calculateDiscountPrice($product['price'], $sale['discountPercent']);
		}
		$this->_params['product'] = $product;

		// Add to Cart-Routine
		if(isset($_POST['addToCartSubmit']))
		{
			$quantity = htmlspecialchars($_POST['quantity']);
			$cartItem['product_id'] = $product['id'];
			$cartItem['quantity'] = $quantity;
			if(isLoggedIn())	// New or Updated Entry in table shoppingcart_has_product
			{
				// include 'core/updateShoppingcart.php';
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
			}
			elseif(thereAreShoppingCartItemsInSession())	// New or Updated Entry in Sessions shoppingCartItems
			{
				// Find existing Entry with same product_id
				$alreadyExisting = false;
				foreach($_SESSION['shoppingCartItems'] as &$item)
				{
					if($item['product_id'] === $product['id'])	// Update quantity in Entry
					{
						$item['quantity'] += $quantity;
						$alreadyExisting = true;
						break;
					}
				}
				if(!$alreadyExisting)	// New Entry
				{
					array_push($_SESSION['shoppingCartItems'], $cartItem);	
				}
				
			}
			else	// Create new Session-ShoppingCart
			{
				$_SESSION['shoppingCartItems'] = array($cartItem);
			}
			// Success-Alert Box contents
			$this->_params['success'] = "Added $quantity to Shopping Cart";
		}
	}
}