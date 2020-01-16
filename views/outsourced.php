<!-- Dropdown Menu -->
<div class="dropdown">
    <button class="dropbtn">Products
    <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
    
    <?php
    $categories = Category::find('id is not null'); 
    $counter = 0;
    $html ='';
    foreach($categories as $category)
    {
        if($counter < MAX_NAV_DROPDOWN_ITEMS)
        {
            $html .= '<a href="index.php?c=products&a=products&cat='.$category['name'].
            '">'.$category['name'].'</a>';
        }
        else
        {
            break;
        }
        $counter += 1;
    }
    echo($html);
    ?>
    </div>
</div>
    <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
if (!e.target.matches('.dropbtn')) {
var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
    myDropdown.classList.remove('show');
    }
}
}

// --------- Filter multiple Categories in actionProducts --------------------
    // if(isset($_GET['cat[]']))
    // {
    // 	// Find Category ID's
    // 	$whereCat = '';
    // 	foreach($_GET['cat[]'] as $categorie)
    // 	{
    // 		$whereCat .= ' name like %'.$categorie.'%';
    // 		// last element?
    // 		if($categorie->next() == false)
    // 		{
    // 			break;
    // 		}
    // 		else
    // 		{
    // 			$whereCat .= ' or';
    // 		}
    // 	}
    // 	$categories = Category::find($whereCat);
    // 	// Find products with given categories
    // 	$where = '';
    // 	foreach($categories as $catID)
    // 	{
    // 		$where .= 'category_id = '.$catID['id'];
    // 		// last element?
    // 		if($catID->next() == false)
    // 		{
    // 			break;
    // 		}
    // 		else
    // 		{
    // 			$where .= ' or';
    // 		}
    // 	}
    // }
