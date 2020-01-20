<h1>Change Password</h1>
<form method="POST">

<fieldset>
<?php if(!empty($errors)) : ?>
   <div class= "error">
      <?php foreach($errors as $error){echo $error."<br>";}?>
   </div>
<?php endif; ?><br>
<input type="password" name="password1"required placeholder =" Your current password"><br><br>
<input type="password" name="password2"required placeholder =" Your new password"><br><br>
<input type="password" name="password3"required placeholder =" Repeat the new password"><br><br>

<button type="submit" name="submit">change password</button>