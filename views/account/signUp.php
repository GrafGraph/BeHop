   <h1>Registrierungsformular</h1>
<form method="POST">

   <fieldset>
   <legend>Zu Ihrer Person</legend>
   <input type="text" name="firstName" placeholder="Vorname"><br><br>
   <input type="text" name="lastName" placeholder="Nachname"><br><br>
   
   <input type="text" name="street" placeholder="Straße"><br>
   <input type="text" name="number" placeholder="Hausnummer"><br>
   <input type="text" name="city" placeholder="Ort"><br>
   <input type="text" name="zip" placeholder="PLZ"><br>
   <input type="text" name="country" placeholder="Land"><br>
   <!-- <select name="countryChoice">
   <?
   // printCountryOptionsGerman()
   ?>
   </select> -->
   </fieldset>

   <fieldset>
   <legend>Anmeldedaten</legend>
   <input type="text" name="email" placeholder="E-Mail"><br><br>
   <input type="password" name="password1" placeholder ="Passwort"><br><br>
   <input type="password" name="password2" placeholder ="Passwort wiederholen"><br><br>
   </fieldset>
   <br>
   <button type="submit" name="submit">Registrieren</button>
   