<?php
namespace beHop;
// require_once 'models/baseModel.class.php';
// require_once 'models/address.class.php';
// require_once 'models/user.class.php';
// require_once 'models/order.class.php';


class PagesController extends Controller
{

	public function actionIndex()
	{
		$this->_params['title'] = 'BeHop - Startseite' ;
	}

	public function actionError404()
	{
		$this->_params['title'] = 'BeHop - Fehler404: Nicht gefunden' ;
	}

	public function actionAboutUs()
	{
		$this->_params['title'] = 'BeHop - Über uns' ;
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