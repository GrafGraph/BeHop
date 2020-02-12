<html lang="de">
	<head>
		<title><?=$title?></title>
		<link rel="shortcut icon" type="image/x-icon" href="assets/images/layout/logo.png">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="assets/css/layout.css">
		<?php if(isset($css) && is_array($css)) : ?>
			<?php foreach($css as $index => $file) : ?>
			<link rel="stylesheet" type="text/css" href="assets/css/<?=$file?>.css">
			<?php endforeach; ?>
		<?php endif; ?>
	</head>
	<body>
		<div class="content-wrap">
			<header>
				<nav class="dimgrey">
					<a href="?a=index" title="Home"><img src="assets/images/layout/logo.png"
					alt="BeHop-Logo" class="logo"></a>
					<ul class="navList">
						<li><a href="index.php?c=products&a=products" title="Products" style="color:<?=highlightNavText('products');?>;">Products</a></li>
						<li><a href="index.php?a=aboutus" title="About Us" style="color:<?=highlightNavText('aboutus');?>">About Us</a></li>
						
						</li>
						<?php if(isLoggedIn()) : ?>
						<li><a href="?c=account&a=logout" title="Logout" style="color:<?=highlightNavText('logout');?>;">Logout</a></li>
						<li><a href="?c=account&a=account" title="Account">
						<img src="assets/images/layout/account<?=highlightNavIcon('account');?>.png" alt="Account" class="navIcon">
						</a></li>
						<?php else : ?>
						<li><a href="?c=account&a=login" title="Login">
						<img src="assets/images/layout/account<?=highlightNavIcon('login');?>.png" alt="Login" class="navIcon">
						</a></li>
						<?php endif; ?>
						<li>
						<a href="index.php?c=account&a=shoppingcart" title="Shopping Cart">
						<img src="assets/images/layout/shoppingCart<?=highlightNavIcon('shoppingcart');?>.png" alt="Einkaufswagen Bild" class="navIcon" style="margin-right:50px;"></a>
						</li>
					</ul>
				</nav>
			</header>
			<main>
				<!-- <div class="errors">
				//<
						// if (isset($_SESSION['errors']))
						// 	{
						// 		foreach()
						// 		{
						// 			// TODO Errors widergeben mit einer for each schleife
						// 		}
						// 	}
					?> -->
				<?php echo $body ?>
			</main>
		</div>
		<footer>
			<a href="?a=index" title="Home" class="noDecoration;">BEHOP</a> &copy; 
			<a href="index.php?a=impressum">Imprint</a>
		</footer>
	</body>
</html>