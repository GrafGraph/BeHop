<?php

namespace app\controller;

class PagesController extends \app\core\Controller
{

	public function actionIndex()
	{
		$this->_params['title'] = 'BeHop - Startseite' ;
	}

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
					$users = User::find('email = ' . $email);

					if(password_verifiy($password, $users[0]['password']))
					{
						$_SESSION['loggedIn'] = true;
						$_SESSION['userMail'] = $users[0]['email'];
						$_SESSION['userID'] = $users[0]['id'];
						header('Location: index.php');
					}
					else
					{
						$_SESSION['loggedIn'] = false;
						$this->params['registerError]'] ='Email und Passwort stimmen nicht überein.'
					}
				}
				else
				{
					$this->params['registerError]'] ='Bitte Email und Passwort eingeben.'
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
		if($_SESSION['loggedIn'] === true)
		{
			if(isset($_SESSION['userID']))
			{
				$user = User::find('ID =' . $_SESSION['userID']);
				$this->params['firstname'] = $user[0]['firstname'];
				$this->params['lastname'] = $user[0]['lastname'];
				$this->params['email'] = $user[0]['email'];
				$this->params['createdAt'] = $user[0]['createdAt'];
				$this->params['updatedAt'] = $user[0]['updatedAt'];

				$address = Address::find('id =' $user[0]['address_id']);
				$this->params['street'] = $address[0]['street'];
				$this->params['number'] = $address[0]['number'];
				$this->params['city'] = $address[0]['city'];
				$this->params['zip'] = $address[0]['zip'];
				$this->params['country'] = $address[0]['country'];

				$latestOrder = Order::findSorted('createdAt',
										 'user_id =' .$_SESSION['userID'], true);
				if(isset($newestOrder))
				{
					$this->params['latestOrder'] = $latestOrder[0]['createdAt'];
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
		}
		
	}

	public function actionError404()
	{
		$this->_params['title'] = 'BeHop - Fehler404: Nicht gefunden' ;
	}

	public function actionAboutUs()
	{
		$this->_params['title'] = 'BeHop - Über uns' ;
	}

	public function actionContact()
	{
		$this->_params['title'] = 'BeHop - Kontakt' ;
	}

	public function actionProducts()
	{
		$this->_params['title'] = 'BeHop - Produkte' ;
	}

	public function actionShoppingcart()
	{
		$this->_params['title'] = 'BeHop - Einkaufswagen' ;
	}

	public function actionImpressum()
	{
		$this->_params['title'] = 'BeHop - Impressum' ;
	}
	
	public function actionProjectDocumentation()
	{
		$this->_params['title'] = 'BeHop - Projektdokumentation' ;
	}
}