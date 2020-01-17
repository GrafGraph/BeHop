<?php
namespace beHop;

class AccountController extends Controller
{
	public function actionLogin()
	{
		$this->_params['title'] = 'BeHop - Login' ;
		if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] === false)
		{
			if(isset($_POST['submit']))
			{
				if(isset($_POST['email']) && isset($_POST['password']))
				{
					$email    = $_POST['email'];
					$password = $_POST['password'];
					$user = User::findOne('email = ' . "'".$email."'");
					if(password_verify($password, $user['password']))
					//if($password == $user['password']) // without hash...
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

	//TODO: Logout Seite erstellen, funktion schon da :)
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
		if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true)
		{
			if(isset($_SESSION['userID']))
			{
				$user = User::findOne('ID =' . "'".$_SESSION['userID']."'");
				$this->_params['user'] = $user;

				$address = Address::findOne('id = ' . $user['address_id']);
				$this->_params['address'] = $address;

				$latestOrder = Order::findOne('user_id = ' .$_SESSION['userID']);
				// $latestOrder = Order::findSorted('createdAt',
				// 						 'user_id = ' ."'".$_SESSION['userID']."'", true);
				if(isset($latestOrder))
				{
					$this->_params['latestOrder'] = $latestOrder;
				}
			}
		}
		else
		{
			header('Location: index.php');
		}
	}

	public function actionSignUp()
	{
		$this->_params['title'] = 'BeHop - Registrierung' ;
		if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] === false)
		{
			debug_to_logFile('asas');
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
		// TODO: Für User muss ShoppingCart erstellt werden und entsprechend shoppingCartHasProduct befüllt werden
		$this->_params['title'] = 'BeHop - Mein Warenkorb' ;
		$shoppingCartItems = array();
		$userIsLoggedIn = isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true;
		$thereAreShoppingCartItemsInSession = isset($_SESSION['shoppingCartItems']) && !empty($_SESSION['shoppingCartItems']);
		if($userIsLoggedIn || $thereAreShoppingCartItemsInSession)
		{
			$shoppingCartHasProducts = array();
			if($userIsLoggedIn)
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
		if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true && isset($_SESSION['userID']))
		{
			$this->_params['priceTotal'] = $_POST['priceTotal'];
				
			// TODO: Doppelter code: Ähnlich wie actionAccount...
			$user = User::findOne('ID =' . "'".$_SESSION['userID']."'");
			$this->_params['user'] = $user;
			$address = Address::findOne('id = ' . $user['address_id']);
			$this->_params['address'] = $address;

			if(isset($_POST['checkout']))
			{
				$this->_params['step'] = 1;
			}
			elseif(isset($_POST['submit']))
			{
				$this->_params['step'] = 2;
				// select payment? -> always PayPal?
				// confirm data
			}
			elseif(isset($_POST['placeOrder']))
			{
				$this->_params['step'] = 3;
				// create new order
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
}
?>