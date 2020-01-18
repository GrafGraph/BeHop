<h1>My Account</h1>
<!-- TODO: Nicht als Tabelle, sondern als Formularfeldern realisieren -->
<table style="width:30%">
<tr>
    <td>First Name</td>
    <td><?=$user['firstName']?></td>
  </tr>
  <tr>
    <td>Last Name</td>
    <td><?=$user['lastName']?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?=$user['email']?></td>
  </tr>
  <tr>
    <td>Address</td>
    <td><?=$address['country'] . $address['street'] . $address['number'] 
    . $address['city'] . $address['zip']?></td>
  </tr>
  <tr>
    <td>Last Order</td>
    <td><?=$latestOrder['createdAt']?></td>
  </tr>
  <tr>
    <td>Account created</td>
    <td><?=$user['createdAt']?></td>
  </tr>
  <tr>
    <td>Last Update</td>
    <td><?=$user['updatedAt']?></td>
  </tr>
</table>