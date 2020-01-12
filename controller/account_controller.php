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
					// if(password_verify($password, $user['password']))
					if($password == $user['password'])
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
		$this->_params['title'] = 'BeHop - Account' ;
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
		session_start();
		$errors = array(); 
		if($_SESSION['loggedIn'] === false)
		{
			if(isset($_POST['submit']))
			{
			$firstName = $_POST['firstname'] ?? null;
			$lastName = $_POST['lastName'] ?? null;
			$street = $_POST['street'] ?? null;
			$number = $_POST['number'] ?? null;
			$city = $_POST['city'] ?? null;
			$zip = $_POST['zip'] ?? null;
			$country = $_POST['country'] ?? null;
			$email    = $_POST['email'] ?? null;
			$password1 = $_POST['password1'] ?? null;
			$password2 = $_POST['password2'] ?? null;
			
			if (empty($firstName)) { array_push($errors, "Vornahme wird benötigt!"); }
			if (empty($lastName)) { array_push($errors, "Nachnahme wird benötigt!"); }
			if (empty($street)) { array_push($errors, "Straße wird benötigt!"); }
			if (empty($number)) { array_push($errors, "Hausnummer wird benötigt!"); }
			if (empty($city)) { array_push($errors, "Stadt wird benötigt!"); }
			if (empty($zip)) { array_push($errors, "Postleitzahl wird benötigt!"); }
			if (empty($country)) { array_push($errors, "Stadt wird benötigt!"); }
			if (empty($email)) { array_push($errors, "Email is required"); }
			if (empty($password1)) { array_push($errors, "Passwort wird benötigt!"); }
			if (empty($password2)) { array_push($errors, "Passwort muss richtig widerholt werden!"); }
			if($password1 != $password2)
			{
				array_push($errors, "Passwort stimmt nicht überein!");

			}

			$user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";

			if($user_check_query != null)
			{
				array_push($errors, "Email existiert schon.");
			}
			if (count($errors) == 0) 
			{
				$password = password_hash($password1, PASSWORD_DEFAULT);
				$addressData = [
					'city' => $city, 
					'street' => $street, 
					'number' => $number, 
					'zip' => $zip, 
					'country' => $country];
		
					$address = new Address($addressData);
					$address->save();
					$user_check_query = "SELECT 'id' FROM address WHERE email='$email' LIMIT 1";
			}
			

			
			
			$userData = [
			'email' => $email, 
			'password' => $password, 
			'firstName' => $firstName, 
			'lastName' => $lastName];
			// TODO: AdressID muss mit übergeben werden!
			if($errors = null)
			{
				header('Location: login.php');
			}

			$user = new User($userData);
			$user->save();
			}
		}
		else
		{
			header('Location: index.php');
		}
		
    }

    public function actionShoppingcart()
	{
		$this->_params['title'] = 'BeHop - Einkaufswagen' ;
	}

	//TODO: Logout Seite erstellen, funktion schon da :)
	// public function actionLogout()
	// {
	// 	session_destroy();
	// 	header('Location: index.php?c=pages&a=login');
	// }
}
?>