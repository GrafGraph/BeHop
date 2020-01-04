<html>
	<head>
		<title>Meine PDO Welt</title>
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
						<li><a href="?a=index">Index</a></li>
						<?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) : ?>
						<li><a href="?a=profile">Profile</a></li>
						<li><a href="?a=logout">Abmelden</a></li>
						<?php else : ?>
						<li><a href="?a=login">Login</a></li>
						<?php endif; ?>
					</ul>
				</nav>
			</header>
			<main>
				<?php echo $body ?>
			</main>
		</div>
		<footer>
			&copy; Kristof Friess for DWP FH Erfurt.
		</footer>
	</body>
</html>