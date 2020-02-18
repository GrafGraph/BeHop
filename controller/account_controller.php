<?php
namespace beHop;

class AccountController extends Controller
{
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
							// 	TODO: Bei Login den Warenkorb der Session nicht verwerfen, falls der Datenbank-Warenkorb leer ist.
							// 	Merge Shoppingcarts
							if(thereAreShoppingCartItemsInSession())
							{
								foreach($_SESSION['shoppingCartItems'] as $item)
								{
									$quantity = $item['quantity'];
									$product['id'] = $item['product_id'];
									$cartItem['product_id'] = $item['product_id'];
									$cartItem['quantity'] = $quantity;

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
								unset($_SESSION['shoppingCartItems']);
								
							}
							header('Location: index.php');
						}
						else
						{
							$_SESSION['loggedIn'] = false;
							$error[] = "Email and password does not match!";
							$this->_params['errors'] = $error;
						}
					}
					else
					{
						$error[] = "Email and password does not match!";
						$this->_params['errors'] = $error;	// Email unbekannt...
					}
				}
				else
				{
					$error[] = "Enter a valid email and password!";
					$this->_params['errors'] = $error;
				}
			}
		}
		else
		{
			header('Location: index.php');
		}
	}

	//TODO: Logout Seite interessanter gestalten? Oder auf index weiterleiten und alert anzeigen?
	public function actionLogout()
	{
		$this->_params['title'] = 'BeHop - Logout';
		if(isLoggedIn())
		{
			$_SESSION['loggedIn'] = false;
		}
		session_destroy();
	}


	public function actionAccount()
	{
		$this->_params['title'] = 'BeHop - Mein Account' ;
		if(isLoggedIn() && isset($_SESSION['userID']))
		{
			// Updating Account Information
			if(isset($_POST['updateAccountSubmit']))
			{
				// TODO: UserID aus Session zu holen ist unsicher? -> Wenn UserID inkorrekt ist oder verändert wird,
				// funktioniert der Rest hier nicht...
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
			// Current Account Information
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

	public function actionSignUp()
	{
		$this->_params['title'] = 'BeHop - Registration' ;
		if(!isLoggedIn())
		{
			if(isset($_POST['submit']))
			{
				$firstName = $_POST['firstName'] ?? null;
				$lastName = $_POST['lastName'] ?? null;
				$street = $_POST['street'] ?? null;
				$number = $_POST['number'] ?? null;
				$city = $_POST['city'] ?? null;
				$zip = $_POST['zip'] ?? null;
				$email    = $_POST['email'] ?? null;
				$password1 = $_POST['password1'] ?? null;
				$password2 = $_POST['password2'] ?? null;
				$error = [];

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
				}
				if($password1 != $password2) 
				{
					$error[] = "Password does not match!";
					$this->_params['errors'] = $error;
				}
				if(empty($firstName))
				{
					$error[] = "Firstname is missing";
					$this->_params['errors'] = $error;
				}
				if(empty($lastName))
				{
					$error[] = "Lastname is missing";
					$this->_params['errors'] = $error;
				}
				if(empty($street))
				{
					$error[] = "Street is missing";
					$this->_params['errors'] = $error;
				}
				if(empty($number))
				{
					$error[] = "Housnumber is missing";
					$this->_params['errors'] = $error;
				}
				if(empty($city))
				{
					$error[] = "City is missing";
					$this->_params['errors'] = $error;
				}
				if(empty($zip))
				{
					$error[] = "ZIP is missing";
					$this->_params['errors'] = $error;
				}
				if(empty($email))
				{
					$error[] = "Email is missing";
					$this->_params['errors'] = $error;
				}
				if(empty($password1))
				{
					$error[] = "Password is missing";
					$this->_params['errors'] = $error;
				}
				if(empty($password2))
				{
					$error[] = "Password is missing";
					$this->_params['errors'] = $error;
				}
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
					header('Location: ?c=account&a=login');		
					}
				}
			}
		}
		else
		{
			header('Location: index.php');
		}
	}

    public function actionShoppingcart()
	{
		$this->_params['title'] = 'BeHop - Shopping Cart' ;

		// Changes to Items and Quantity if $_POST is set
		// if(!empty($_POST))
		// {
			// if(isset($_POST['updateShoppingcartSubmit']))
			// {
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
						if(isset($_POST["remove".$id]) || (isset($_POST["update".$id]) && htmlspecialchars($_POST["quantity".$id]) <= 0))	// Delete
						{
							$updateShoppingCartHasProducts = ShoppingCart_has_product::findOne('shoppingCart_id = '. $latestShoppingCart['id'].' and product_id = '.$id);
							// Delete shoppingCartHasProducts-Entry from Database
							$deletedShoppingCartHasProducts = new ShoppingCart_has_product($updateShoppingCartHasProducts);
							$deletedShoppingCartHasProducts->delete();
						}
						elseif(isset($_POST["update".$id])) // Change Quantity
						{
							$stockCheckProduct = Product::findOne('id = ' .$id);
							if(htmlspecialchars($_POST["quantity".$id]) > $stockCheckProduct['numberInStock'])
							{
								$this->_params['errors'][] = quantityExceededMaxInStockError($stockCheckProduct['name'])."<br>Set to Max of ".$stockCheckProduct['numberInStock'];
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
						if(isset($_POST["remove".$id]) || (isset($_POST["update".$id]) && htmlspecialchars($_POST["quantity".$id]) <= 0))	// Delete
						{
							unset($_SESSION['shoppingCartItems'][$key]);	
						}
						elseif(isset($_POST["update".$id])) // Change Quantity
						{
							$stockCheckProduct = Product::findOne('id = ' .$id);
							if(htmlspecialchars($_POST["quantity".$id]) > $stockCheckProduct['numberInStock'])
							{
								$this->_params['errors'][] = quantityExceededMaxInStockError($stockCheckProduct['name'])."<br>Set to Max of ".$stockCheckProduct['numberInStock'];
								$_POST["quantity".$id] = $stockCheckProduct['numberInStock'];
							}
							$sessionItem['quantity'] = htmlspecialchars($_POST["quantity".$id]);
						}
					}
					if(empty($_SESSION['shoppingCartItems']))
					{
						unset($_SESSION['shoppingCartItems']);
					}
				}
			// }	
		// }
		

		// Choosing the correct Items to display
		$shoppingCartItems = array();
		if(isLoggedIn() || thereAreShoppingCartItemsInSession())
		{
			$shoppingCartHasProducts = array();
			// Get ShoppingCartItems from Database
			if(isLoggedIn())
			{
				$userID = $_SESSION['userID'];
				$shoppingCart = ShoppingCart::findOne('user_id = ' . $userID);
				$shoppingCartHasProducts = ShoppingCart_has_product::find('shoppingCart_id = '. $shoppingCart['id']);
			}
			//	ELSE: Shoppingcart from Session
			else
			{
				$shoppingCartHasProducts = $_SESSION['shoppingCartItems'];
			}

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
					array_push($shoppingCartItems, $product);
				}
			}
			else
			{
				$shoppingCartItems = null;
			}
		}
		// empty shoppingCart
		else
		{
			$shoppingCartItems = null;
		}
		$this->_params['shoppingCartItems'] = $shoppingCartItems;
	}
	
	public function actionCheckout()
	{
		$this->_params['title'] = 'BeHop - Checkout' ;
		// Must be logged in to place an order
		if(isLoggedIn())
		{		
			// TODO: Doppelter code: Ähnlich wie actionAccount...
			$user = User::findOne('ID =' . "'".$_SESSION['userID']."'");
			$this->_params['user'] = $user;
			$address = Address::findOne('id = ' . $user['address_id']);
			$this->_params['address'] = $address;

			if(isset($_POST['checkoutSubmit']))	// confirm data
			{
				$this->_params['priceTotal'] = $_POST['priceTotal'];
				$this->_params['step'] = 1;
				
			}
			elseif(isset($_POST['confirmedInformationSubmit']))	// select payment
			{
				$this->_params['priceTotal'] = $_POST['priceTotal'];
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

				// TODO: Must be easier than this...
			// Decrease amount of Items in Stock
				$shoppingCart_has_products = ShoppingCart_has_product::find('shoppingCart_id = ' .$shoppingCart['id']);
				foreach($shoppingCart_has_products as $entry)
				{
					$updatedProduct = Product::findOne('id = '.$entry['product_id']);
					$updatedProduct['numberInStock'] -= $entry['quantity'];
					$newProduct = new Product($updatedProduct);
					$newProduct->save();
				}

				// TODO: Must be easier than this...
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
				// TODO: What else?
			}
		}
		else
		{
			header('Location: ?c=account&a=shoppingcart');
		}
	}

	public function actionPayment()
	{
		$this->_params['title'] = 'BeHop - Payment' ;
		if(isset($_POST['placeOrderSubmit']))
		{
			if(isset($_POST['paymentMethod']) && isset($_POST['priceTotal']))
			{
				$this->_params['paymentMethod'] = $_POST['paymentMethod'];
				$this->_params['priceTotal'] = $_POST['priceTotal']; 
				// if($_POST['paymentMethod'] == "paypal")
				// {
					 
				// }
			}
		}
	}

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
					$userPassword = password_verify($password1, $userData['password']);

					if($password1 == $userPassword)
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

	public function actionPasswordChanged()
	{
		$this->_params['title'] = 'BeHop - Password changed!' ;
	}
}

?>