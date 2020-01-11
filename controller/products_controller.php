<?php
namespace beHop;


class ProductsController extends Controller
{
	public function actionProducts()
	{
		$this->_params['title'] = 'BeHop - Produkte' ;

		// TODO: Aus Url filtern
		$products = Product::find('id = 1');
		$this->_params['product0'] = $products[0];
	}
}