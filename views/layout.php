<html lang="de">
	<head>
		<title><?=$title?></title>
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
				<nav style="background-color:#333333;">
					<a href="?a=index" title="Home"><img src="/Git/BeHop/assets/images/layout/logo.png"
					alt="BeHop-Logo" style="float:left; max-height:80px; margin-left:50px;"></a>
					<ul style="height:80px;">
						<li><a href="index.php?c=products&a=products" title="Products" style="color:<?=highlightNavText('products');?>">Products</a></li>
						<li><a href="index.php?a=aboutus" title="About Us" style="color:<?=highlightNavText('aboutus');?>">About Us</a></li>
						
						</li>
						<?php if(isLoggedIn()) : ?>
						<li><a href="?c=account&a=logout" title="Logout" style="color:<?=highlightNavText('logout');?>">Logout</a></li>
						<li><a href="?c=account&a=account" title="Account">
						<img src="/Git/BeHop/assets/images/layout/account<?=highlightNavIcon('account');?>.png" alt="Account" style="max-height:40px;">
						</a></li>
						<?php else : ?>
						<li><a href="?c=account&a=login" title="Login">
						<img src="/Git/BeHop/assets/images/layout/account<?=highlightNavIcon('login');?>.png" alt="Login" style="max-height:40px;">
						</a></li>
						<?php endif; ?>
						<li>
						<a href="index.php?c=account&a=shoppingcart" title="Shopping Cart">
						<img src="/Git/BeHop/assets/images/layout/shoppingCart<?=highlightNavIcon('shoppingcart');?>.png" alt="Einkaufswagen Bild" style="max-height:40px; margin-right:50px;"></a>
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
			<a href="?a=index" title="Home" style="text-decoration:none;">BEHOP</a> &copy; 
			<a href="index.php?a=impressum">Imprint</a>
		</footer>
	</body>
</html>