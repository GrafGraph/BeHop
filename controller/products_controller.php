<?php
namespace beHop;


class ProductsController extends Controller
{
	public function actionProducts()
	{
		$this->_params['title'] = 'BeHop - Produkte' ;

		// TODO: IF: Falls Filteroptionen -> Aus Url filtern

		// Else: Show all products and their images
			$where = 'id is not null';
			$products = Product::find($where);	
			
			// Image to product...
			// TODO: Mehrere Images berücksichtigen. MainImage usw. 
			foreach($products as &$product)
			{
				$product['image'] = Image::findOne('product_id = ' . $product['id']);
			}
			$this->_params['products'] = $products;
	}

	public function actionShowProduct()
	{
		$product = Product::findOne('id = '. htmlspecialchars($_GET['productID']));
		$this->_params['title'] = 'Behop - '. $product['name'];
		$this->_params['images'] = Image::find('product_id = ' . $product['id']);
		$this->_params['product'] = $product;
	}
}