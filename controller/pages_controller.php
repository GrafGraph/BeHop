<?php

namespace app\controller;
require_once 'models/address.class.php';

use Address;

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
				$email    = $_POST['email'] ?? null;
				$password = $_POST['password'] ?? null;

				if($email === 'max@fh-erfurt.de' && $password === '12345678')
				{
					$_SESSION['loggedIn'] = true;
					// $_SESSION['userID'] = User::find('email = '. $email);
					header('Location: index.php');
				}
				else
				{
					$_SESSION['loggedIn'] = false;
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
			
			$firstName = $_POST['firstname'] ?? null;
			$lastName = $_POST['lastName'] ?? null;
			$street = $_POST['street'] ?? null;
			$number = $_POST['number'] ?? null;
			$city = $_POST['city'] ?? null;
			$zip = $_POST['zip'] ?? null;
			$country = $_POST['country'] ?? null;
			$password = $_POST['password'] ?? null;
			$password = $_POST['password'] ?? null;
			$email    = $_POST['email'] ?? null;

			$addressData = ['city', 'street', 'number', 'zip', 'country'];
			$address = new Address($addressData);
			$address->save();
			

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