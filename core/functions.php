<?php

 const DEBUG =true;
// const ERROR =true;
 
function debug_to_logFile($message, $class = null){
    if(DEBUG){
        $class= ($class != null) ? $class:  '';
        $message = '['.(new DateTime())->format('Y-m-d H:i:s ').$class. ']' . $message. "\n";
        file_put_contents ( __DIR__.'/../logs/logs.txt', $message,FILE_APPEND);
    }
}

function getImagesToProductID($productID){
    return Image::find('product_id = ' . $productID);
}

// Prints selected to display which filter option on products was used
// function appendSelectedIfSet($html, $filterOption, $category)
// {
//     if(isset($_GET[$filterOption]) && htmlspecialchars($_GET[$filterOption]) == $category)
//     {
//        $html .= ' selected ';
//     }
// }

// appends all filters from the URL to the Where-statement and returns it.
// if no filters were used, $where will target ALL products.
// function whereWithFiltersFromUrl()
// {
//     $where = '';
//     if(isset($_GET['cat']) || isset($_GET['productName']) || isset($_GET['color']) || isset($_GET['brand']) || isset($_GET['sale']) || isset($_GET['maxPrice']))
//     {
//         if(!empty($_GET['cat']))
//         {
//             $category = Category::findOne('name like "%'.htmlspecialchars($_GET['cat']).'%"');
//             if(!empty($category['id']))
//             $where .= ' category_id = '.$category['id'].' and';
//             else
//             {
//                 debug_to_logFile('$category["id"]) is empty!');
//             }
//         }
//         if(!empty($_GET['productName']))
//         {
//             $where .= ' name like "%'.htmlspecialchars($_GET['productName']).'%" and';
//         }
//         if(!empty($_GET['color']))
//         {
//             $where .= ' color ="'.htmlspecialchars($_GET['color']).'" and';
//         }
//         if(!empty($_GET['brand']))
//         {
//             $where .= ' brand like "%'.htmlspecialchars($_GET['brand']).'%" and';
//         }
//         if(!empty($_GET['sale']))
//         {
//             $where .= ' sales_id is not null and';
//         }
//         if(!empty($_GET['maxPrice']))
//         {
//             $where .= ' price <= '.htmlspecialchars($_GET['maxPrice']).' and';
//         }
//         // substr($where, 0, -4); // remove the last 4 chars-> ' and' // Not needed since we always add ' id is not null'
//     }
//     $where .= ' id is not null';
// }

// filterOptions is array of possible options. attribute is needed key for filterOption
// Example: getFilterOptions($categories, 'name', 'cat');
function getFilterOptions($filterOptions, $attribute, $urlAttribute)
{
    $string = '';
    foreach($filterOptions as $filterOption)
		{
                $string .= '<option value="'.$filterOption[$attribute].'"';
                // Remember which option was selected
				if(isset($_GET[$urlAttribute]) && $_GET[$urlAttribute] == $filterOption[$attribute])
				{
				   $string .=' selected';
				}
				$string .= '>'.$filterOption[$attribute].'</option>';
        }
    return $string;	
    // ------ Based on: ---------
    // foreach($categories as $category)
    // {
    // 		$html .= '<option value="'.$category['name'].'"';
    // 		if(isset($_GET['cat']) && htmlspecialchars($_GET['cat']) == $category)
    // 		{
    // 		   $html .=' selected ';
    // 		}
    // 		$html .= '>'.$category['name'].'</option>';
    // }   
}