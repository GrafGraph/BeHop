<html>
	<head>
	<?= '<title>'.$this->_params['title'].'</title>'?>
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
						<li><a href="?a=logout">Logout</a></li>
						<li><a href="?a=profile">Profile</a></li>
						<?php else : ?>
						<li><a href="?a=login">Login</a></li>
						<?php endif; ?>
						<li><a href="index.php?a=shoppingcart" title="Shoppingcart"><img src="" alt="Einkaufswagen Bild"></a></li>
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