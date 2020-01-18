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

		// Get Highlights
		// $highlights = Image::find('product_id is null AND sales_id is null');
		// $this->_params['highlights'] = $highlights;
	}

	public function actionError404()
	{
		$this->_params['title'] = 'BeHop - Error404: Not Found' ;
	}

	public function actionAboutUs()
	{
		$this->_params['title'] = 'BeHop - About Us' ;
	}

	public function actionImpressum()
	{
		$this->_params['title'] = 'BeHop - Imprint' ;
	}
	
	public function actionProjectDocumentation()
	{
		$this->_params['title'] = 'BeHop - Projectdocumentation' ;
	}
}