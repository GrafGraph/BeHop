<html>
	<head>
	<?= '<title>'.$title.'</title>'?>
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
						<li><a href="index.php?a=sales">Sales</a></li>
						<li><a href="index.php?a=products">Products</a></li>
						<li><a href="index.php?a=contact">Contact</a></li>
						<li><a href="index.php?a=aboutus">About Us</a></li>
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
				<?php echo $body ?>
			</main>
		</div>
		<footer>
			BEHOP &copy; 
			<a href="index.php?a=impressum">Impressum</a>
		</footer>
	</body>
</html>