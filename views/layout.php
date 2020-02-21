<html lang="de">

<head>
	<title><?= $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/layout/logo.png">
	<link rel="stylesheet" type="text/css" href="assets/css/layout.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>

	<?php if (isset($css) && is_array($css)) : ?>
		<?php foreach ($css as $index => $file) : ?>
			<link rel="stylesheet" type="text/css" href="assets/css/<?= $file ?>.css">
		<?php endforeach; ?>
	<?php endif; ?>
</head>
<body>
	<div class="content-wrap">
		<header>
			<nav class="BeHopGrey">
				<a href="?a=index" title="Home">
					<img src="assets/images/layout/logo.png" alt="BeHop-Logo" class="logo">
				</a>
				<ul class="navList">
					<li class="dropdown">
						<a href="index.php?c=products&a=products" title="Products" style="color:<?= highlightNavText('products'); ?>;">Products</a>
						<div class="dropdown-content" style="width:490px;">
							<?productsMenu($categories);?>
						</div>
					</li>
					<li>
						<a href="index.php?a=aboutus" title="About Us" style="color:<?= highlightNavText('aboutus'); ?>">About Us</a>
					</li>
					<li>
						<form method="GET" action="index.php?c=products&a=products">
							
							<!-- hidden fields for controller and action location -->
							<input type="hidden" name="c" value="products">
							<input type="hidden" name="a" value="products">
							<input style="width:100%;" type="text" name="search" placeholder="Search..." id="mainSearch">
							<button style="all:initial; display:inline; position:absolute; cursor:pointer; margin-left:1%"><img style="height:35px; " type="submit"src="assets/images/layout/lens.png" alt="Lens Icon for Search"></img></button>		
						</form>
					</li>
					<?php if (isLoggedIn()) : ?>
						<li>
							<a href="?c=account&a=logout" title="Logout" style="color:<?= highlightNavText('logout'); ?>;">Logout</a>
						</li>
						<li>
							<a href="?c=account&a=account" title="Account">
								<img src="assets/images/layout/account<?= highlightNavIcon('account'); ?>.png" alt="Account" class="navIcon">
							</a>
						</li>
					<?php else : ?>
						<li>
							<a href="?c=account&a=login" title="Login">
								<img src="assets/images/layout/account<?= highlightNavIcon('login'); ?>.png" alt="Login" class="navIcon">
							</a>
						</li>
					<?php endif; ?>
					<li>
						<a href="index.php?c=account&a=shoppingcart" title="Shopping Cart">
							<img src="assets/images/layout/shoppingCart<?= highlightNavIcon('shoppingcart'); ?>.png" alt="Einkaufswagen Bild" class="navIcon" style="margin-right:50px;">
							<div class="shoppingcartQuantity" id="shoppingcartContent1"><?=shoppingcartContent();?></div>
						</a>
					</li>
				</ul>
			</nav>
			<nav class="BeHopGrey2" id="fullListMin">
				<a href="?a=index" title="Home">
					<img src="assets/images/layout/logo.png" alt="BeHop-Logo" class="logo">
				</a>
				<ul class="navList">
					<?php if (isLoggedIn()) : ?>
						<li>
							<a href="?c=account&a=account" title="Account">
								<img id="icons" src="assets/images/layout/account<?= highlightNavIcon('account'); ?>.png" style="width: 40px; height: 40px;" alt="Account" class="navIcon">
							</a>
						</li>
					<?php else : ?>
						<li>
							<a href="?c=account&a=login" title="Login">
								<img id="icons"src="assets/images/layout/account<?= highlightNavIcon('login'); ?>.png" style="width: 40px; height: 40px;" alt="Login" class="navIcon">
							</a>
						</li>
					<?php endif; ?>
					<li>
						<a href="index.php?c=account&a=shoppingcart" title="Shopping Cart">
							<img id="icons" src="assets/images/layout/shoppingCart<?= highlightNavIcon('shoppingcart'); ?>.png" alt="Einkaufswagen Bild" class="navIcon" style="margin-right:50px;">
							<div class="shoppingcartQuantity" id="shoppingcartContent2"><?=shoppingcartContent();?></div>
						</a>
					</li>
					<noscript>
					<div class="dropdown">
						<li>
							<button class="dropbtn"><img id="icons"src="assets/images/layout/lens.png" style="width: 40px; height: 40px;" alt="Menu" class="navIcon"></button>
						</li>
						<div class="dropdown-content">
						<li>
						<form method="GET" action="index.php?c=products&a=products">
							
							<!-- hidden fields for controller and action location -->
							<input type="hidden" name="c" value="products">
							<input type="hidden" name="a" value="products">
							<input style="width:100%;" type="text" name="search" placeholder="Search..." id="mainSearch">
							<button style="all:initial; display:inline; position:absolute; cursor:pointer; margin-left:1%"><img style="height:35px; " type="submit"src="assets/images/layout/lens.png" alt="Lens Icon for Search"></img></button>		
						</form>
					</li>
						</div>
					</div>
					</noscript>
					<li id="searchClick">
						<button id="searchIcon" style="all:initial; display:inline; position:relative; cursor:pointer; float: left; "><img type="submit"src="assets/images/layout/lens.png" alt="Lens Icon for Search" class="navIcon"></img></button>
					</li>
					<div class="dropdown">
						<li>
							<button class="dropbtn"><img id="icons"src="assets/images/layout/menuRed.png" style="width: 40px; height: 40px;" alt="Menu" class="navIcon"></button>
						</li>
						<div class="dropdown-content">
							<li><a href="index.php?c=products&a=products">Products</a></li>
							<li><a href="index.php?a=aboutus">About Us</a></li>
							<?php if (isLoggedIn()) : ?>
								<li><a href="?c=account&a=logout">Logout</a></li>
							<?php else : ?>
								<li><a href="?c=account&a=login">Login</a></li>
							<?php endif; ?>
						</div>
					</div>
				</ul>
			</nav>
			<div class="searchFieldMaxTabletVersion" id="searchMin" style="display: none;">
			<form method="GET" action="index.php?c=products&a=products">
				<input type="hidden" name="c" value="products">
				<input type="hidden" name="a" value="products">
				<input class="inputSearch" type="text" name="search" placeholder="Search..." id="mainSearch" style="float: left;">
				<button id= "searchIconButton" style="all:initial; display:inline; position:relative; cursor:pointer; float: left; width: 10%; height: 40px; margin-top: 20px;"><img  style="height:35px; " type="submit"src="assets/images/layout/lens.png" alt="Lens Icon for Search"></img></button>
			</form>
			<div id="backToNav"><img src="assets/images/layout/smallXWhite.png"  alt="X" class="navIcon"></div>
				<div class="clear"></div>
			</div>
			<nav class="BeHopGrey3" id="fullListMin2">
						<a href="?a=index" title="Home">
							<img src="assets/images/layout/logo.png" alt="BeHop-Logo" class="logo" style="float: left;">
						</a>
				<ul class="navList">
				<noscript>
					<div class="dropdown">
						<li>
							<button class="dropbtn"><img id="icons"src="assets/images/layout/lens.png" style="width: 40px; height: 40px;" alt="Menu" class="navIcon"></button>
						</li>
						<div class="dropdown-content">
						<li>
						<form method="GET" action="index.php?c=products&a=products">
							
							<!-- hidden fields for controller and action location -->
							<input type="hidden" name="c" value="products">
							<input type="hidden" name="a" value="products">
							<input style="width:100%;" type="text" name="search" placeholder="Search..." id="mainSearch">
							<button style="all:initial; display:inline; position:absolute; cursor:pointer; margin-left:1%"><img style="height:35px; " type="submit"src="assets/images/layout/lens.png" alt="Lens Icon for Search"></img></button>		
						</form>
					</li>
						</div>
					</div>
				</noscript>
					<li id="searchClick2">
					<button id="searchIcon" style="all:initial; display:inline; position:relative; cursor:pointer;"><img  style="height: 40px; width: 40px; margin-top: 0px; float: left; margin-right: 50px"type="submit"src="assets/images/layout/lens.png" alt="Lens Icon for Search"></img></button>
					</li>
					<div class="dropdown">
						<li>
							<button class="dropbtn"><img id="icons"src="assets/images/layout/menuRed.png" style="width: 40px; height: 40px; margin-left: 60px" alt="Menu" class="navIcon"></button>
						</li>
						<div class="dropdown-content">
							<li><a href="index.php?c=products&a=products">Products</a></li>
							<li><a href="index.php?a=aboutus">About Us</a></li>
							<?php if (isLoggedIn()) : ?>
								<li><a href="?c=account&a=account">Account</a></li>
								<li><a href="?c=account&a=logout">Logout</a></li>
							<?php else : ?>
								<li><a href="?c=account&a=login">Login</a></li>
							<?php endif; ?>
							<li><a href="index.php?c=account&a=shoppingcart">Shopping Cart</a></li>
						</div>
					</div>
				</ul>
			</nav>
			<div class="searchFieldMaxSmartphoneVersion" id="searchMin2" style="display: none;">
			<form method="GET" action="index.php?c=products&a=products">
				<input type="hidden" name="c" value="products">
				<input type="hidden" name="a" value="products">
				<input class="inputSearch2" type="text" name="search" placeholder="Search..." id="mainSearch" style="float: left;">
				<button id= "searchIconButton2" style="all:initial; display:inline; position:relative; cursor:pointer;"><img style="float: left; width: 36px; height: 36px; margin-top: 22px;"  type="submit"src="assets/images/layout/lens.png" alt="Lens Icon for Search"></img></button>
			</form>
			<div id="backToNav2"><img src="assets/images/layout/smallXWhite.png" style="width: 36px; height: 36px;  margin-left: 88%; margin-top: -55px;" alt="X"></div>
				<div class="clear"></div>
			</div>
		</header>
		<main id="main">
			<?php echo $body ?>
		</main>
	</div>
	<footer>
		<a href="?a=index" title="Home" class="noDecoration">BEHOP</a> &copy;
		<a href="index.php?a=legalDetails">Legal Details</a>
	</footer>
</body>
<script src="assets/js/listenerLayout.js"></script>

</html>