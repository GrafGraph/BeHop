   <h1>Registration</h1>
<form method="POST">

   <fieldset>
 
   <legend>Personal data</legend>
   <!-- <output type='errors' name='errors' value ="<?if(isset($_POST['errors']){echo $_POST['errors'];}?>"><br> -->
   <input type="text" name="firstName" required value = "<?=isset($_POST['firstName']) ? $_POST['firstName'] : ''?>" placeholder="firstname"><br><br>
   <input type="text" name="lastName" required value = "<?=isset($_POST['lastName']) ? $_POST['lastName'] : ''?>" placeholder="lastname"><br><br>
   
   <input type="text" name="street" required value = "<?=isset($_POST['street']) ? $_POST['street'] : ''?>" placeholder="street"><br>
   <input type="text" name="number" required value = "<?=isset($_POST['number']) ? $_POST['number'] : ''?>"placeholder="housnumber"><br>
   <input type="text" name="city" required value = "<?=isset($_POST['city']) ? $_POST['city'] : ''?>" placeholder="city"><br>
   <input type="text" name="zip" required  value = "<?=isset($_POST['zip']) ? $_POST['zip'] : ''?>" placeholder="ZIP"><br>
   
   </fieldset>

   <fieldset>
   <legend>Login data</legend>
   <input type="email" name="email" required value = "<?=isset($_POST['email']) ? $_POST['email'] : ''?>" placeholder="E-Mail"><br><br>
   <input type="password" name="password1"required placeholder ="password"><br><br>
   <input type="password" name="password2"required placeholder ="repeat the password"><br><br>
   </fieldset>
   <br>
   <button type="submit" name="submit">register</button>
   