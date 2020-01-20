<?php
namespace beHop;

class AccountController extends Controller
{
	public function actionLogin()
	{
		$this->_params['title'] = 'BeHop - Login' ;
		if(!isLoggedIn())
		{
			if(isset($_POST['submit']))
			{
				if(isset($_POST['email']) && isset($_POST['password']))
				{
					$email    = $_POST['email'];
					$password = $_POST['password'];
					$user = User::findOne('email = ' . "'".$email."'");
					if(password_verify($password, $user['password']))
					{
						$_SESSION['loggedIn'] = true;
						$_SESSION['userMail'] = $user['email'];
						$_SESSION['userID'] = $user['id'];
						// 	TODO: Bei Login den Warenkorb der Session nicht verwerfen, falls der Datenbank-Warenkorb leer ist.
						header('Location: index.php');
					}
					else
					{
						$_SESSION['loggedIn'] = false;
						$this->params['registerError]'] = ('Email und Passwort stimmen nicht überein.');
					}
				}
				else
				{
					$this->params['registerError]'] = ('Bitte Email und Passwort eingeben.');
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
		if($_SESSION['loggedIn'] === true)
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
			if(isset($_POST['submit']))
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
					'zip' => $_POST['zip'],
					'country' => $_POST['country']
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
		$this->_params['title'] = 'BeHop - Mein Warenkorb' ;

		// Changes to Items and Quantity if $_POST['submit'] is set
		if(isset($_POST['submit']))
		{
			
			if(isLoggedIn())	// Update Database
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
			elseif(thereAreShoppingCartItemsInSession())	// Update Session
			{
				for($n = 0; $n < $_POST['numberOfItems']; $n++)
				{	
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
			//	ELSE: Warenkorb ergibt sich aus Session
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

			if(isset($_POST['checkout']))	// confirm data
			{
				$this->_params['priceTotal'] = $_POST['priceTotal'];
				$this->_params['step'] = 1;
				
			}
			elseif(isset($_POST['submit']))	// select payment
			{
				$this->_params['priceTotal'] = $_POST['priceTotal'];
				$this->_params['step'] = 2;
				// TODO: always PayPal?
			}
			elseif(isset($_POST['placeOrder']))	// create new order
			{
			// open PayPal in new Tab

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