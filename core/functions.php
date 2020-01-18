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

// returns selected to display which filter option on products was used
// function SelectedIfSet($html, $filterOption, $category)
// {
//     $html = '';
//     if(isset($_GET[$filterOption]) && htmlspecialchars($_GET[$filterOption]) == $category)
//     {
//         ' selected ';
//     }
//     return $html;
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