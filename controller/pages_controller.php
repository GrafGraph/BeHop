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
				$email    = $_POST['email'] ?? null;
				$password = $_POST['password'] ?? null;

				if($email === 'max@fh-erfurt.de' && $password === '12345678')
				{
					$_SESSION['loggedIn'] = true;
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


	public function actionProfile()
	{
		$this->_params['title'] = 'BeHop - Profile' ;
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
		$this->_params['title'] = 'BeHop - SignUp' ;
		if($_SESSION['loggedIn'] === false)
		{

		}
		
	}

	public function actionError404()
	{
		$this->_params['title'] = 'BeHop - Error404: Not Found' ;
	}
}