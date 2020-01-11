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
					$users = User::find('email = ' . "'".$email."'");
					// if(password_verify($password, $users[0]['password']))
					if($password == $users['password'])
					{
						$_SESSION['loggedIn'] = true;
						$_SESSION['userMail'] = $users['email'];
						$_SESSION['userID'] = $users['id'];
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
			$password = $_POST['password'] ?? null;
			$password = $_POST['password'] ?? null;
			

			$addressData = ['city', 'street', 'number', 'zip', 'country'];
			$address = new Address($addressData);
			$address->save();
			
			$userData = ['email', 'password', 'firstName', 'lastName'];
			$user = new User($userData);
			$user->save();
			}
		}
    }

    public function actionShoppingcart()
	{
		$this->_params['title'] = 'BeHop - Einkaufswagen' ;
    }
}
?>