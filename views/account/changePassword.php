<h1 class="headline form-background">Change Password</h1>
<section class="center form-background fullheight">
   <div class="form-wrap">
      <div class="account-form">
         <form method="POST">
         <?php if(!empty($errors)) : ?>
            <div class= "error">
               <?php foreach($errors as $error){echo $error."<br>";}?>
            </div>
         <?php endif; ?><br>
         <label for="password1">Current Password</label>
         <input type="password" name="password1"required placeholder =" Your current password"><br><br>
         <label for="password2">New Password</label>
         <input type="password" name="password2"required placeholder =" Your new password"><br><br>
         <label for="password3">Confirm New Password</label>
         <input type="password" name="password3"required placeholder =" Repeat the new password"><br><br>

         <button type="submit" name="submit">Change Password</button>
      </div>
      <br>
   </div>
</section>