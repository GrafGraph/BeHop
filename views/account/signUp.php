   <h1>Registrierungsformular</h1>
<form method="POST">

   <fieldset>
   <? foreach($errors as $error)
   {
      echo($error);
   }
  ?>
   <legend>Zu Ihrer Person</legend>
   <input type="text" name="firstName" required value = "<?=isset($_POST['firstname']) ? $_POST['firstname'] : ''?>" placeholder="Vorname"/><br><br>
   <input type="text" name="lastName" placeholder="Nachname"><br><br>
   
   <input type="text" name="street" required placeholder="Straße"><br>
   <input type="text" name="number" required placeholder="Hausnummer"><br>
   <input type="text" name="city" required placeholder="Ort"><br>
   <input type="text" name="zip" required  placeholder="PLZ"><br>
   <!-- <input type="text" name="country" required placeholder="Land"><br> -->
   
   </fieldset>

   <fieldset>
   <legend>Anmeldedaten</legend>
   <input type="email" name="email" required placeholder="E-Mail"><br><br>
   <input type="password" name="password1"required placeholder ="Passwort"><br><br>
   <input type="password" name="password2"required placeholder ="Passwort wiederholen"><br><br>
   </fieldset>
   <br>
   <button type="submit" name="submit">Registrieren</button>
   