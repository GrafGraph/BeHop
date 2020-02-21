<?php
namespace beHop;

class FunctionsController extends Controller
{
	public function actionShoppingcartContent()
    {
        if(isset($_GET['ajax']))
        {
            echo json_encode(['shoppingcartContent' => shoppingcartContent()]);
        }
        // else
        // {
        //     return shoppingcartContent();
        // }
    }
}