<h1>Mein Account</h1>

<table style="width:30%">
<tr>
    <td>Vorname</td>
    <td><?=$firstname?></td>
  </tr>
  <tr>
    <td>Nachname</td>
    <td><?=$lastname?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?=$email?></td>
  </tr>
  <tr>
    <td>Anschrift</td>
    <td rowspan="3"><?=$country . $street . $number . $city . $zip?></td>
  </tr>
  <tr>
    <td>Letzte Bestellung</td>
    <td><?=$latestOrder?></td>
  </tr>
  <tr>
    <td>Account erstellt</td>
    <td><?=$createdAt?></td>
  </tr>
  <tr>
    <td>Letzte Aktualisierung</td>
    <td><?=$updatedAt?></td>
  </tr>
</table>