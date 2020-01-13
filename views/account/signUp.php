   <h1>Registrierungsformular</h1>
<form method="POST">

   <fieldset>
 
   <legend>Zu Ihrer Person</legend>

   <input type="text" name="firstName" required value = "<?=isset($_POST['firstName']) ? $_POST['firstName'] : ''?>" placeholder="Vorname"><br><br>
   <input type="text" name="lastName" required value = "<?=isset($_POST['lastName']) ? $_POST['lastName'] : ''?>" placeholder="Nachname"><br><br>
   
   <input type="text" name="street" required value = "<?=isset($_POST['street']) ? $_POST['street'] : ''?>" placeholder="Straße"><br>
   <input type="text" name="number" required value = "<?=isset($_POST['number']) ? $_POST['number'] : ''?>"placeholder="Hausnummer"><br>
   <input type="text" name="city" required value = "<?=isset($_POST['city']) ? $_POST['city'] : ''?>" placeholder="Ort"><br>
   <input type="text" name="zip" required  value = "<?=isset($_POST['zip']) ? $_POST['zip'] : ''?>" placeholder="PLZ"><br>
   
   </fieldset>

   <fieldset>
   <legend>Anmeldedaten</legend>
   <input type="email" name="email" required value = "<?=isset($_POST['email']) ? $_POST['email'] : ''?>" placeholder="E-Mail"><br><br>
   <input type="password" name="password1"required placeholder ="Passwort"><br><br>
   <input type="password" name="password2"required placeholder ="Passwort wiederholen"><br><br>
   </fieldset>
   <br>
   <button type="submit" name="submit">Registrieren</button>
   