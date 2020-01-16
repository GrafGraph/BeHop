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
				<nav>
					<ul>
						<li><a href="?a=index" title="Home"><img src=""
						alt="BeHop-Logo" style="background-color:black"></a></li>
						<li>

						<li><a href="index.php?c=products&a=sales">Sales</a></li>
						<li><a href="index.php?c=products&a=products">Products</a></li>
						<li><a href="index.php?a=aboutus">About Us</a></li>
						
						</li>
						<?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) : ?>
						<li><a href="?c=account&a=logout">Logout</a></li>
						<li><a href="?c=account&a=account">Mein Konto</a></li>
						<?php else : ?>
						<li><a href="?c=account&a=login">Login</a></li>
						<?php endif; ?>
						<li><a href="index.php?c=account&a=shoppingcart" title="Shoppingcart"><img src="" alt="Einkaufswagen Bild"></a></li>
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
			<a href="index.php?a=impressum">Impressum</a>
		</footer>
	</body>
</html>