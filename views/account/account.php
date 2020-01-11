<h1>Mein Account</h1>
<!-- TODO: Nicht als Tabelle, sondern als Formularfeldern realisieren -->
<table style="width:30%">
<tr>
    <td>Vorname</td>
    <td><?=$user['firstName']?></td>
  </tr>
  <tr>
    <td>Nachname</td>
    <td><?=$user['lastName']?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?=$user['email']?></td>
  </tr>
  <tr>
    <td>Anschrift</td>
    <td><?=$address['country'] . $address['street'] . $address['number'] 
    . $address['city'] . $address['zip']?></td>
  </tr>
  <tr>
    <td>Letzte Bestellung</td>
    <td><?=$latestOrder['createdAt']?></td>
  </tr>
  <tr>
    <td>Account erstellt</td>
    <td><?=$user['createdAt']?></td>
  </tr>
  <tr>
    <td>Letzte Aktualisierung</td>
    <td><?=$user['updatedAt']?></td>
  </tr>
</table>