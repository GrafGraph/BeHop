<?php
namespace beHop;

class AccountController extends Controller
{
	// @author Michael Hopp & Anton Bespalov
	public function actionLogin()
	{
		$this->_params['title'] = 'BeHop - Login' ;
		if(!isLoggedIn())
		{
			if(isset($_POST['loginSubmit']))
			{
				if(isset($_POST['email']) && isset($_POST['password']))
				{
					$email    = $_POST['email'];
					$password = $_POST['password'];
					$user = User::findOne('email = ' . "'".$email."'");
					if(!empty($user))
					{
						if(password_verify($password, $user['password']))
						{
							$_SESSION['loggedIn'] = true;
							$_SESSION['userMail'] = $user['email'];
							$_SESSION['userID'] = $user['id'];
							// 	Merge Shoppingcarts
							if(thereAreShoppingCartItemsInSession())
							{
								$shoppingCart = ShoppingCart::findOne('user_id = '.$_SESSION['userID']);
								foreach($_SESSION['shoppingCartItems'] as $product)
								{
									$quantity = $product['quantity'];
									$product['id'] = $product['product_id'];
									$cartItem['product_id'] = $product['product_id'];
									$product['numberInStock'] = Product::findOne('id = '. $product['id'])['numberInStock'];
									include 'core/updateShoppingcart.php';
								}
								unset($_SESSION['shoppingCartItems']);
								
							}
							header('Location: index.php');
						}
						else
						{
							$_SESSION['loggedIn'] = false;
							$error[] = "Email and Password dont match!";
							$this->_params['errors'] = $error;
						}
					}
					else
					{
						$error[] = "Email and Password dont match!";
						$this->_params['errors'] = $error;	// Email unbekannt...
					}
				}
				else
				{
					$error[] = "Enter a valid Email and Password!";
					$this->_params['errors'] = $error;
				}
			}
		}
		else
		{
			header('Location: index.php');
		}
	}

	// @author Michael Hopp
	public function actionLogout()
	{
		$this->_params['title'] = 'BeHop - Logout';
		if(isLoggedIn())
		{
			$_SESSION['loggedIn'] = false;
		}
		session_destroy();
	}

	// @author Michael Hopp & Anton Bespalov
	public function actionAccount()
	{
		$this->_params['title'] = 'BeHop - Mein Account' ;
		if(isLoggedIn() && isset($_SESSION['userID']))
		{
			// Updating Account Information
			if(isset($_POST['updateAccountSubmit']))
			{
				$user_temp = User::findOne('ID =' . "'".$_SESSION['userID']."'");
				$usermail = $user_temp['email'];
				if($usermail == $_POST['email']){
					$insertError = [];
					$userData = [
						'id' => $_SESSION['userID'],
						'email' => $_POST['email'],
						'firstName' => $_POST['firstName'],
						'lastName' => $_POST['lastName'],
					];

					// Address already in Database?
					$addressData = [
						'city' => $_POST['city'],
						'street' => $_POST['street'],
						'number' => $_POST['number'],
						'zip' => $_POST['zip']
					];
					$existingAddress = Address::findAddress($addressData);
					if($existingAddress != null)
					{
						$userData['address_id'] = $existingAddress['id'];
					}
					else
						{
							// Create new Address
							$newAddress = new Address($addressData);
							if(!Address::validateAddress($newAddress, $insertError)){
								$this->_params['insertError'] = $insertError;
								return false;
							}
							else
							{
								$newAddress->save();
								$newAddress = Address::findAddress($addressData);
								$userData['address_id'] = $newAddress['id'];
							}
						}

					// Updating User
					$newUser = new User($userData);
					if(!User::validateUser($newUser, $insertError)){
						$this->_params['insertError'] = $insertError;
						return false;
					}
					else
					{
						$newUser->save();
					}
				}
				else
				{
					$email    = $_POST['email'];
					$user_data = User::findOne('email = "' . $email . '"');
					if($user_data != null)
					{ 
						$error[] = "Email is already in use!";
						$this->_params['errors'] = $error; 
						return false;
					}
					else
					{
					$insertError = [];
					$userData = [
						'id' => $_SESSION['userID'],
						'email' => $_POST['email'],
						'firstName' => $_POST['firstName'],
						'lastName' => $_POST['lastName'],
					];

					// Address already in Database?
					$addressData = [
						'city' => $_POST['city'],
						'street' => $_POST['street'],
						'number' => $_POST['number'],
						'zip' => $_POST['zip']
					];
					$existingAddress = Address::findAddress($addressData);
					if($existingAddress != null)
						{
							$userData['address_id'] = $existingAddress['id'];
						}
						else
						{
							// Create new Address
							$newAddress = new Address($addressData);
							if(!Address::validateAddress($newAddress, $insertError)){
								$this->_params['insertError'] = $insertError;
								return false;
							}
							else
							{
								$newAddress->save();
								$newAddress = Address::findAddress($addressData);
								$userData['address_id'] = $newAddress['id'];
							}
						}

					// Updating User
					$newUser = new User($userData);
					if(!User::validateUser($newUser, $insertError)){
						$this->_params['insertError'] = $insertError;
						return false;
					}
					else
					{
						$newUser->save();
					}
					}
				}
			}
			// Display Current Account Information
			$user = User::findOne('ID =' . "'".$_SESSION['userID']."'");
			$this->_params['user'] = $user;

			$address = Address::findOne('id = ' . $user['address_id']);
			$this->_params['address'] = $address;

			$latestOrder = Order::findSorted('createdAt', 'user_id = '.$_SESSION['userID'], true);
			if(!empty($latestOrder))
			{
				$this->_params['latestOrder'] = $latestOrder[0];
			}

			if(isset($_GET['changedPassword']) && htmlspecialchars($_GET['changedPassword']) == 'true' )
			{
				$this->_params['passwordChanged'] = "Successfully changed Password!";
			}
		}
		else
		{
			header('Location: index.php');
		}
	}

	// @author Anton Bespalov
	public function actionSignUp()
	{
		$this->_params['title'] = 'BeHop - Registration' ;
		if(!isLoggedIn())
		{
			if(isset($_POST['submit']))
			{
				$firstName 		= $_POST['firstName'] ?? null;
				$lastName 		= $_POST['lastName'] ?? null;
				$street 		= $_POST['street'] ?? null;
				$number 		= $_POST['number'] ?? null;
				$city 			= $_POST['city'] ?? null;
				$zip 			= $_POST['zip'] ?? null;
				$email   		= $_POST['email'] ?? null;
				$password1 		= $_POST['password1'] ?? null;
				$password2 		= $_POST['password2'] ?? null;
				$error 			= [];
				// Testing if data is valid
				$userData = [
					'email' => $_POST['email'],
					'firstName' => $_POST['firstName'],
					'lastName' => $_POST['lastName']
				];
				$newUser = new User($userData);
				if(User::validateUser($newUser, $error) == false){
					$this->_params['errors'] = $error;
					return false;
				}

				$addressData = [
					'city' => $_POST['city'],
					'street' => $_POST['street'],
					'number' => $_POST['number'],
					'zip' => $_POST['zip']
				];

				$newAddress = new Address($addressData);
					if(Address::validateAddress($newAddress, $error) == false){
						$this->_params['errors'] = $error;
						return false;
					}

				$user_data = User::findOne('email = "' . $email . '"');
				if($user_data != null)
				{ 
					$error[] = "Email is already in use!";
					$this->_params['errors'] = $error; 
					return false;
				}
				if($password1 != $password2) 
				{
					$error[] = "Password does not match!";
					$this->_params['errors'] = $error;
					return false;
				}
				if(empty($firstName))
				{
					$error[] = "Firstname is missing";
					$this->_params['errors'] = $error;
					return false;
				}
				if(empty($lastName))
				{
					$error[] = "Lastname is missing";
					$this->_params['errors'] = $error;
					return false;
				}
				if(empty($street))
				{
					$error[] = "Street is missing";
					$this->_params['errors'] = $error;
					return false;
				}
				if(empty($number))
				{
					$error[] = "Housnumber is missing";
					$this->_params['errors'] = $error;
					return false;
				}
				if(empty($city))
				{
					$error[] = "City is missing";
					$this->_params['errors'] = $error;
					return false;
				}
				if(empty($zip))
				{
					$error[] = "ZIP is missing";
					$this->_params['errors'] = $error;
					return false;
				}
				if(empty($email))
				{
					$error[] = "Email is missing";
					$this->_params['errors'] = $error;
					return false;
				}
				if(empty($password1))
				{
					$error[] = "Password is missing";
					$this->_params['errors'] = $error;
					return false;
				}
				if(empty($password2))
				{
					$error[] = "Password is missing";
					$this->_params['errors'] = $error;
					return false;
				}
				// if everything ok -> saving data
				else
				{
					$address_data = Address::findOne('city = "' . $city . '" and street = "' . $street . '" and number = "' . $number . '" and zip = "' . $zip . '";');
					if($address_data == null)
					{
						$addressData = [
							'city' => $city, 
							'street' => $street, 
							'number' => $number, 
							'zip' => $zip];
				
							$address = new Address($addressData);
							$address->save();		
							$address_data = Address::findOne('city = "' . $city . '" and street = "' . $street . '" and number = "' . $number . '" and zip = "' . $zip . '";');
							$address_id = $address_data['id'];

						$password = password_hash($password1, PASSWORD_DEFAULT);
						$userData = [
							'email' => $email, 
							'password' => $password, 
							'firstName' => $firstName, 
							'lastName' => $lastName,
							'address_id' => $address_id
						];
						
					$user = new User($userData);
					$user->save();

					// Create new ShoppingCart for User
					$user_id = User::findOne('email = "'. $email.'"');
					$shoppingCartData = ['user_id' => $user_id['id']];
					$shoppingCart = new ShoppingCart($shoppingCartData);
					$shoppingCart->save();	
					}	
					else
					{
						$address_data = Address::findOne('city = "' . $city . '" and street = "' . $street . '" and number = "' . $number . '" and zip = "' . $zip . '";');
						$address_id = $address_data['id'];
						$password = password_hash($password1, PASSWORD_DEFAULT);
						$userData = [
							'email' => $email, 
							'password' => $password, 
							'firstName' => $firstName, 
							'lastName' => $lastName,
							'address_id' => $address_id
						];
						
						$user = new User($userData);
						$user->save();

						// Create new ShoppingCart for User
						$user_id = User::findOne('email = "'. $email.'"');
						$shoppingCartData = ['user_id' => $user_id['id']];
						$shoppingCart = new ShoppingCart($shoppingCartData);
						$shoppingCart->save();	
					}
				header('Location: ?c=account&a=login');	
				}
			}
		}
		else
		{
			header('Location: index.php');
		}
	}

	// @author Michael Hopp
    public function actionShoppingcart()
	{
		$this->_params['title'] = 'BeHop - Shopping Cart' ;
		$errors = null;
		// Changes to Items and Quantity?
		if(isLoggedIn())	// Update Database
		{
			$userID = $_SESSION['userID'];
			// Get latest Shoppingcart-Content
			$latestShoppingCart = ShoppingCart::findOne('user_id = ' . $userID);
			$shoppingCartProducts = ShoppingCart_has_product::find('shoppingCart_id = '. $latestShoppingCart['id']);
			// Which product was changed?
			foreach($shoppingCartProducts as $product)
			{
				$id = strval($product['product_id']);
				// Delete or change quantity?
				if(isset($_POST["remove".$id]) || (isset($_POST["update".$id]) && htmlspecialchars($_POST["quantity".$id]) <= 0) || (isset($_GET['ajax']) && $_GET['ajax']==$id))	// Delete
				{
					$updateShoppingCartHasProducts = ShoppingCart_has_product::findOne('shoppingCart_id = '. $latestShoppingCart['id'].' and product_id = '.$id);
					// Delete shoppingCartHasProducts-Entry from Database
					$deletedShoppingCartHasProducts = new ShoppingCart_has_product($updateShoppingCartHasProducts);
					$deletedShoppingCartHasProducts->delete();
					if(isset($_GET['ajax']))
					{	
						$quantity = shoppingcartContent();			// Update Nav counter
						$_SESSION['priceTotal'] = getTotalPrice();	// Update Total Cost
						echo json_encode([
							'shoppingcartContent' => $quantity ?? null,
							'total' => $_SESSION['priceTotal'] ?? null
						]);		
						exit(0); // Send JSON to Client
					}
				}
				elseif(isset($_POST["update".$id])) // Change Quantity
				{
					$stockCheckProduct = Product::findOne('id = ' .$id);
					if(htmlspecialchars($_POST["quantity".$id]) > $stockCheckProduct['numberInStock'])
					{
						$errors[] = quantityExceededMaxInStockError($stockCheckProduct['name'])."<br>Set to Max of ".$stockCheckProduct['numberInStock'];
						$_POST["quantity".$id] = $stockCheckProduct['numberInStock'];
					}
					$updateShoppingCartHasProducts = ShoppingCart_has_product::findOne('shoppingCart_id = '. $latestShoppingCart['id'].' and product_id = '.$id);
					// Update Quantity
					$updateShoppingCartHasProducts['quantity'] = $_POST["quantity".$id];
					$updatedShoppingCart = new ShoppingCart_has_product($updateShoppingCartHasProducts);
					$updatedShoppingCart->save();
				}
			}
		}
		elseif(thereAreShoppingCartItemsInSession())	// Update Session
		{
			foreach($_SESSION['shoppingCartItems'] as $key => &$sessionItem)
			{
				$id = $sessionItem['product_id'];
				// Delete or change quantity?
				if(isset($_POST["remove".$id]) || (isset($_POST["update".$id]) && htmlspecialchars($_POST["quantity".$id]) <= 0) || (isset($_GET['ajax']) && $_GET['ajax']==$id))	// Delete
				{
					unset($_SESSION['shoppingCartItems'][$key]);
					if(isset($_GET['ajax']))
					{	
						$quantity = shoppingcartContent();				// Update Nav counter
						$_SESSION['priceTotal'] = getTotalPrice();		// Update Total Cost
						echo json_encode([
							'shoppingcartContent' => $quantity ?? null,
							'total' => $_SESSION['priceTotal'] ?? null
						]);		
						exit(0); // Send JSON to Client
					}	
				}
				elseif(isset($_POST["update".$id])) // Change Quantity
				{
					$stockCheckProduct = Product::findOne('id = ' .$id);
					if(htmlspecialchars($_POST["quantity".$id]) > $stockCheckProduct['numberInStock'])
					{
						$errors[] = quantityExceededMaxInStockError($stockCheckProduct['name'])."<br>Set to Max of ".$stockCheckProduct['numberInStock'];
						$_POST["quantity".$id] = $stockCheckProduct['numberInStock'];
					}
					// Update Quantity
					$sessionItem['quantity'] = htmlspecialchars($_POST["quantity".$id]);
				}
			}
			if(empty($_SESSION['shoppingCartItems']))	// No Items left -> Clear Sessions "Shopping Cart"
			{
				unset($_SESSION['shoppingCartItems']);
			}
		}

		// Choosing the correct Items to display
		$shoppingCartItems = null;
		$shoppingCartHasProducts = getShoppingCartItems();
		if(!empty($shoppingCartHasProducts))
		{
			foreach($shoppingCartHasProducts as $OrderItem)
			{
				$product = Product::findOne('id = '. $OrderItem['product_id']);
				$product['quantity'] = $OrderItem['quantity'];
				$product['image'] = Image::findOne('product_id = '. $product['id']);
				if($product['sales_id'] !== null)	// Product in Sale
				{
					// Apply Discounts
					$sale = Sales::findOne('id ='.$product['sales_id']);
					$product['discountPrice'] = calculateDiscountPrice($product['price'], $sale['discountPercent']);
				}
				$product['priceForPosition'] = $product['quantity'] * (isset($product['discountPrice']) ? $product['discountPrice'] : $product['price']);
				$shoppingCartItems[] = $product;
			}
			$_SESSION['priceTotal'] = getTotalPrice();	// In Session for later Use in Checkout 	WORKAROUND: Satisfies our needs for now but is considered unsafe...
		}
		else
		{
			$_SESSION['priceTotal'] = 0.0;
		}
		$this->_params['shoppingCartItems'] = $shoppingCartItems;
		$this->_params['errors'] = (!empty($errors)) ? $errors : null;
	}
	
	// @author Michael Hopp
	public function actionCheckout()
	{
		$this->_params['title'] = 'BeHop - Checkout' ;
		// Must be logged in to place an order
		if(isLoggedIn())
		{	
			$user = User::findOne('ID =' . "'".$_SESSION['userID']."'");
			$this->_params['user'] = $user;
			// $_SESSION['priceTotal'] = getTotalPrice();	// Already calculated in shoppingcart
			if(isset($_POST['checkoutSubmit']))	// confirm data
			{
				$address = Address::findOne('id = ' . $user['address_id']);
				$this->_params['address'] = $address;
				$this->_params['step'] = 1;
			}
			elseif(isset($_POST['confirmedInformationSubmit']))	// select payment
			{
				$this->_params['step'] = 2;
			}
			elseif(isset($_POST['paidSubmit']))	// create new order
			{
				$this->_params['step'] = 3;
			// find ShoppingCart to User
				$shoppingCart=ShoppingCart::findOne('user_id ='.$user['id']);
				$orderData = [
					'user_id' => $user['id'],
					'shoppingcart_id' => $shoppingCart['id']
				];
				$order = new Order($orderData);
				$order->save();

			// Decrease amount of Items in Stock
				$shoppingCart_has_products = ShoppingCart_has_product::find('shoppingCart_id = ' .$shoppingCart['id']);
				foreach($shoppingCart_has_products as $entry)
				{
					$updatedProduct = Product::findOne('id = '.$entry['product_id']);
					$updatedProduct['numberInStock'] -= $entry['quantity'];
					$newProduct = new Product($updatedProduct);
					$newProduct->save();
				}

			// "Delete" ShoppingCart for User
				$updatedShoppingCart = new ShoppingCart($shoppingCart);
				$updatedShoppingCart->setUserIDNull();
			// Create new empty ShoppingCart for User
				$newShoppingCartData = [
					'id' => null,
					'user_id' => $user['id']
				];
				$newShoppingCart = new ShoppingCart($newShoppingCartData);
				$newShoppingCart->save();
			}
			else
			{
				header('Location: ?c=account&a=shoppingcart');
			}
		}
		else
		{
			header('Location: ?c=account&a=shoppingcart');
		}
	}

	// @author Michael Hopp
	public function actionPayment()
	{
		$this->_params['title'] = 'BeHop - Payment' ;
		if(isset($_POST['placeOrderSubmit']))
		{
			$this->_params['paymentMethod'] = $_POST['paymentMethod'] ?? null;
		}
	}

	// @author Anton Bespalov
	public function actionChangePassword()
	{
		$this->_params['title'] = 'BeHop - Change password' ;

			if(isset($_POST['submit']))
			{
				$password1 = $_POST['password1'] ?? null;
				$password2 = $_POST['password2'] ?? null;
				$password3 = $_POST['password3'] ?? null;

				if(empty($password1))
				{
					$error[] = "Password is missing";
					$this->_params['errors'] = $error;
				}
				if(empty($password2))
				{
					$error[] = "New password is missing";
					$this->_params['errors'] = $error;
				}
				if(empty($password3))
				{
					$error[] = "New password is missing";
					$this->_params['errors'] = $error;
				}

				if($password2 !== $password3)
				{
					$error[] = "New password does not match!";
					$this->_params['errors'] = $error;
				}
				else
				{
					$userData = User::findOne('email = '. '"'.$_SESSION['userMail'].'"'); 
					$userID = $userData['id'];
					$firstName = $userData['firstName'];
					$lastName = $userData['lastName'];
					$address_id = $userData['address_id'];

					$user_temp = User::findOne('ID =' . "'".$_SESSION['userID']."'");
					$userPassword = $user_temp['password'];
					
					if(password_verify($password1, $userPassword))
					{
						$password = password_hash($password3, PASSWORD_DEFAULT);
						$userData = [
							'id' => $userID,
							'email' => $_SESSION['userMail'], 
							'password' => $password,
							'firstName' => $firstName, 
							'lastName' => $lastName,
							'address_id' => $address_id
						];
						$user = new User($userData);
						$user->save();
						header('Location: ?c=account&a=account&changedPassword=true');
					}
					else
					{
					$error[] = "The current password does not match";
					$this->_params['errors'] = $error;
					}

				}
			}

	}
}

?>