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
					//if($password == $user['password'])
					{
						$_SESSION['loggedIn'] = true;
						$_SESSION['userMail'] = $user['email'];
						$_SESSION['userID'] = $user['id'];
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
				// if($password1 !== $password2) 
				// {
				// 	$this->params['errors'] = "Passwort stimmt nicht überein!";
				// 	header('Location: ?c=account&a=signUp');
				// }
				// $user_data= User::findOne('email = "' . $email . '"');
				// if($emailFindOne = $user_data['email']){ array_push($errors, "Email wird bereits verwendet!"); }
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
				$this->_params['errors'] = $errors;
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
		$this->_params['title'] = 'BeHop - Mein Warenkorb' ;
		$shoppingCartItems = array();
		// IF: Nutzer eingeloggt -> eigener warenkorb aus Datenbank
		if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true)
		{
			$userID = $_SESSION['userID'];
			$shoppingCart = ShoppingCart::findOne('user_id = ' . $userID);
			$shoppingCartHasProducts = ShoppingCart_Has_Product::find('shoppingCart_id = '. $shoppingCart['id']);

			
			foreach($shoppingCartHasProducts as $OrderItem)
			{
				$product = Product::findOne('id = '. $OrderItem['product_id']);
				$product['quantity'] = $OrderItem['quantity'];
				$product['image'] = Image::findOne('product_id = '. $product['id']);
				array_push($shoppingCartItems, $product);
			}	
		}
		//	ELSE: Warenkorb ergibt sich aus Session
		/*	TODO: Beim Hinzufügen von Produkten zum Warenkorb diese Information in $_SESSION schreiben.
			TODO: Bei Login den Warenkorb der Session nicht verwerfen, wenn der Datenbank-Warenkorb leer ist.
		*/
		else
		{
			if(isset($_SESSION['shoppingCartItems']) && !empty($_SESSION['shoppingCartItems']))
			{
				$shoppingCartItems = $_SESSION['shoppingCartItems'];
			}
			else
			{
				$shoppingCartItems = null;
			}
		}
		$this->_params['shoppingCartItems'] = $shoppingCartItems;
    }
}
?>