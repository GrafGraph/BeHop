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
		$this->_params['title'] = 'BeHop - Home' ;

		// Get Sales
		$sales = Sales::find('id is not null');
		// Image to sale
		foreach($sales as &$sale)
		{
			$sale['image'] = Image::findOne('sales_id = ' . $sale['id']);
		}
		$this->_params['sales'] = $sales;
	}

	public function actionError404()
	{
		$this->_params['title'] = 'BeHop - Error404: Not Found' ;
	}

	public function actionAboutUs()
	{
		$this->_params['title'] = 'BeHop - About Us' ;
	}

	public function actionLegalDisclosure()
	{
		$this->_params['title'] = 'BeHop - Legal Disclosure' ;
	}
	
	public function actionProjectDocumentation()
	{
		$this->_params['title'] = 'BeHop - Projectdocumentation' ;
	}
}