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
						<div class="dropdown-content">
							<? productsMenu(); ?>
						</div>
					</li>
					<li>
						<a href="index.php?a=aboutus" title="About Us" style="color:<?= highlightNavText('aboutus'); ?>">About Us</a>
					</li>
					<li>
						<form method="GET" action="index.php?c=products&a=products">
							<input type="text" name="search" placeholder="Search...">
							<input type="submit" name="searchSubmit">
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
						</a>
					</li>
					<li id="searchClick">
						<i class="fas fa-search" style="width: 45%; height: 45%; margin-left: -70%; color: white !important; opacity: 1.4;"></i>
					</li>
					<div class="dropdown">
						<li>
							<button class="dropbtn">Menu</button>
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
			<div class ="searchFieldMaxTabletVersion" id="searchMin" style="display: none;">
				<input class= "inputSearch" type="text" placeholder="Search..." style = "float: left;">
				<i class="fas fa-search" style = "float: left; width: 5%; height: 40px; margin-top: 20px; margin-left: 3%"></i>
				<div id="backToNav"><i class="fas fa-times" style = " width: 100%; height: 100%;"></i></div>
				<div class= "clear"></div>

			</div>
			<nav class="BeHopGrey3">
				<ul class="navList">
					<li>
						<a href="?a=index" title="Home">
							<img src="assets/images/layout/logo.png" alt="BeHop-Logo" class="logo">
						</a>
					</li>
					<div class="dropdown">
						<li>
							<button class="dropbtn">Menu</button>
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
		</header>
		<main>
			<?php echo $body ?>
		</main>
	</div>
	<footer>
		<a href="?a=index" title="Home" class="noDecoration">BEHOP</a> &copy;
		<a href="index.php?a=impressum">Imprint</a>
	</footer>

	<script>
		document.getElementById("searchClick").addEventListener('click', function() {
			var nav = document.getElementById('fullListMin');
			var searchFull = document.getElementById('searchMin');
			nav.style.display = "none";
			searchFull.style.display = "block";
		});


		document.getElementById('backToNav').addEventListener('click', function() {
			var nav = document.getElementById('fullListMin');
			var searchFull = document.getElementById('searchMin');
			nav.style.display = "block";
			searchFull.style.display = "none";
		});
	</script>
</body>

</html>