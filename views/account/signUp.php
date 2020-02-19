<h1 class="headline form-background">Registration</h1>
<section class="center form-background">
<div class="form-wrap">
		<div class="account-form">   
         <form method="POST">
            <fieldset>
            <legend>Personal data</legend>
               <?php if(!empty($errors)) : ?>
                  <div class= "error">
                     <?php foreach($errors as $error){echo $error."<br>";}?>
                  </div>
               <?php endif; ?><br>
               <label>Firstname: </label>
               <input type="text" id="firstNameInput" name="firstName" required value = "<?=isset($_POST['firstName']) ? $_POST['firstName'] : ''?>" ><br><br>
               <label>Lastname: </label>
               <input type="text" id="lastNameInput" name="lastName" required value = "<?=isset($_POST['lastName']) ? $_POST['lastName'] : ''?>" ><br><br>
               <label>Street: </label>
               <input type="text" id="streetInput" name="street" required value = "<?=isset($_POST['street']) ? $_POST['street'] : ''?>" ><br>
               <label>Number: </label>
               <input type="text" id="numberInput" name="number" required value = "<?=isset($_POST['number']) ? $_POST['number'] : ''?>"><br>
               <label>City: </label>
               <input type="text" id="cityInput" name="city" required value = "<?=isset($_POST['city']) ? $_POST['city'] : ''?>" ><br>
               <label>ZIP: </label>
               <input type="text" id="zipInput" name="zip" required  value = "<?=isset($_POST['zip']) ? $_POST['zip'] : ''?>" ><br>
            </fieldset>
<br>
            <fieldset>
            <legend>Login data</legend>
               <label>Email:: </label>
               <input type="email" id="emailInput"  name="email" required value = "<?=isset($_POST['email']) ? $_POST['email'] : ''?>" ><br><br>
               <label>Password: </label>
               <input class="passwordInput" type="password" name="password1"required ><br><br>
               <label>Repeat the password: </label>
               <input class="passwordInput" type="password" name="password2"required ><br><br>
            </fieldset>
            <br>
            <button type="submit" name="submit">register</button>
         </form>
      </div>
      <br>
   </div>
            <script src="assets/js/validation.js"></script>
</section>