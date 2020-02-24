<?php
namespace beHop;

class PagesController extends Controller
{
	// @author Michael Hopp
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

	// @author Michael Hopp
	public function actionError404()
	{
		$this->_params['title'] = 'BeHop - Error404: Not Found' ;
	}

	// @author Michael Hopp
	public function actionAboutUs()
	{
		$this->_params['title'] = 'BeHop - About Us' ;
	}

	// @author Michael Hopp
	public function actionlegalDetails()
	{
		$this->_params['title'] = 'BeHop - Legal Details' ;
	}
	
	// @author Michael Hopp, Anton Bespalov
	public function actionProjectDocumentation()
	{
		$this->_params['title'] = 'BeHop - Projectdocumentation' ;
	}
}