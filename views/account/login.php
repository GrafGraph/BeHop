<h1 class="headline form-background">Login</h1>
<section class="center form-background">
	<div class="form-wrap">
		<div class="account-form">
			<form method="post">
			<?php if(!empty($errors)) : ?>
                  <div class= "error">
                     <?php foreach($errors as $error){echo $error."<br>";}?>
				  </div>
				  <br>
               <?php endif; ?><br>
				<label for="email">E-Mail</label> <br>
				<input type="email" name="email" required id="email"/><br>
				<label for="password">Password</label> <br />
				<input class="passwordInput" type="password" name="password" id="password" /><br>
				<br />
				<input type="submit" name="loginSubmit" value="Login now!" /><br>
			</form>
			<br>
			<a href="index.php?c=account&a=signUp"><button>Create Account</button></a>
		</div>
		<br>
	</div>
	<script src="assets/js/validationLogin.js"></script>
</section>


