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

	public function actionLogout()
	{
		if($_SESSION['loggedIn'] === true)
		{
			$_SESSION['loggedIn'] = false;
		}

		header('Location: index.php');
		exit();
	}


	public function actionAccount()
	{
		$this->_params['title'] = 'BeHop - Mein Account' ;
		if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true)
		{
			if(isset($_SESSION['userID']))
			{
				debug_to_logFile('anton ist der allercoolste');
				$user = User::findOne('ID =' . "'".$_SESSION['userID']."'");
				debug_to_logFile($user['firstName']);
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
		$errors = array(); 
		if($_SESSION['loggedIn'] === false)
		{
			if(isset($_POST['submit']))
			{
				$firstName = $_POST['firstName'] ?? null;
				$lastName = $_POST['lastName'] ?? null;
				$street = $_POST['street'] ?? null;
				$number = $_POST['number'] ?? null;
				$city = $_POST['city'] ?? null;
				$zip = $_POST['zip'] ?? null;
				$country = $_POST['country'] ?? null;
				$email    = $_POST['email'] ?? null;
				$password1 = $_POST['password1'] ?? null;
				$password2 = $_POST['password2'] ?? null;
			
				if (empty($firstName)) { array_push($errors, "Vorname wird benötigt!"); }
				if (empty($lastName)) { array_push($errors, "Nachname wird benötigt!"); }
				if (empty($street)) { array_push($errors, "Straße wird benötigt!"); }
				if (empty($number)) { array_push($errors, "Hausnummer wird benötigt!"); }
				if (empty($city)) { array_push($errors, "Stadt wird benötigt!"); }
				if (empty($zip)) { array_push($errors, "Postleitzahl wird benötigt!"); }
				if (empty($country)) { array_push($errors, "Stadt wird benötigt!"); }
				if (empty($email)) { array_push($errors, "Email is required"); }
				if (empty($password1)) { array_push($errors, "Passwort wird benötigt!"); }
				if (empty($password2)) { array_push($errors, "Passwort muss richtig widerholt werden!"); }
				if($password1 !== $password2) {array_push($errors, "Passwort stimmt nicht überein!");}
				// $emailFindOne= User::findOne('email = "' . $email . '"');
				// if($emailFindOne !== null){ array_push($errors, "Email wird bereits verwendet!"); }
				// $addressFindOne = Address::findOne('city = "' . $city . '" and street = "' . $street . '" and number = "' . $number . '" and zip = "' . $zip . '" and country = "' . $country . '";');
				// if($addressFindOne === null) 
				// {
					$addressData = [
						'city' => $city, 
						'street' => $street, 
						'number' => $number, 
						'zip' => $zip, 
						'country' => $country];
			
						$address = new Address($addressData);
						$address->save();
				// }
					$address_data = Address::findOne('city = "' . $city . '" and street = "' . $street . '" and number = "' . $number . '" and zip = "' . $zip . '" and country = "' . $country . '";');
					$address_id = $address_data['id'];
					$password = password_hash($password1, PASSWORD_DEFAULT);

					$userData = [
						'email' => $email, 
						'password' => $password, 
						'firstName' => $firstName, 
						'lastName' => $lastName,
						'address_id' => $address_id];
						
						$user = new User($userData);
						$user->save();
				
				// if($errors === null)
				// {
				// 	header('Location: login.php');
				// } 
				// else
				// {
					
				// }
			}
			// $_SESSION['errors'] = $errors;
		}
	else
	{
		header('Location: index.php');
	}
}

	//TODO: Logout Seite erstellen, funktion schon da :)
	// public function actionLogout()
	// {
	// 	session_destroy();
	// 	header('Location: index.php?c=pages&a=login');
	// }

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
				$shoppingCartHasProducts = ShoppingCart_Has_Product::find('shoppingCart_id = '. $shoppingCart['id']);
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
}
?>