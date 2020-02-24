<!-- @author Anton Bespalov -->
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
               <p id="wrongFirstName"></p>
               <input type="text" id="firstNameInput" name="firstName" required value = "<?=isset($_POST['firstName']) ? $_POST['firstName'] : ''?>" ><br><br>
               <label>Lastname: </label>
               <p id="wrongLastName"></p>
               <input type="text" id="lastNameInput" name="lastName" required value = "<?=isset($_POST['lastName']) ? $_POST['lastName'] : ''?>" ><br><br>
               <label>Street: </label>
               <p id="wrongStreet"></p>
               <input type="text" id="streetInput" name="street" required value = "<?=isset($_POST['street']) ? $_POST['street'] : ''?>" ><br>
               <label>Number: </label>
               <p id="wrongNumber"></p>
               <input type="text" id="numberInput" name="number" required value = "<?=isset($_POST['number']) ? $_POST['number'] : ''?>"><br>
               <label>City: </label>
               <p id="wrongCity"></p>
               <input type="text" id="cityInput" name="city" required value = "<?=isset($_POST['city']) ? $_POST['city'] : ''?>" ><br>
               <label>ZIP: </label>
               <p id="wrongZIP"></p>
               <input type="text" id="zipInput" name="zip" required  value = "<?=isset($_POST['zip']) ? $_POST['zip'] : ''?>" ><br>
            </fieldset>
<br>
            <fieldset>
            <legend>Login data</legend>
               <label>Email: </label>
               <p id="wrongEmail"></p>
               <input type="email" id="emailInput"  name="email" required value = "<?=isset($_POST['email']) ? $_POST['email'] : ''?>" ><br><br>
               <label>Password: </label>
               <input class="passwordInput" type="password" name="password1"required ><br><br>
               <label>Repeat the password: </label>
               <input class="passwordInput" type="password" name="password2"required ><br><br>
            </fieldset>
            <br>
            <button id="submitButtonRegister" type="submit" name="submit">Register</button>
         </form>
      </div>
      <br>
   </div>
            <script src="assets/js/validation.js"></script>
</section>