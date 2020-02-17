<h1 class="headline form-background">My Account</h1>
<section class="center form-background">
  <?if(isset($insertError))
    {?> <div class="error"><?
      if(is_array($insertError))
      {
        foreach($insertError as $error)
        {?>
              <?=$error?> <br>
        <?}
      }
      else
      {
          echo $insertError;
      }?>
    </div>
  <? } ?>
  <? if(isset($passwordChanged) && !empty($passwordChanged)) :?>
      <div class="success"><?=$passwordChanged?></div>
  <? endif;?>
  <form autocomplete="off" action="?c=account&a=account" method="POST" class="account-form">
      <!-- firstname -->
      <div class="input">
          <label for="firstname">First Name</label>
          <input type = "text" id="firstName" name="firstName" required
            value = "<?=isset($_POST['firstName']) ? htmlspecialchars($_POST['firstName']) : htmlspecialchars($user['firstName'])?>">
          <!-- <span class="error-message" id="errorFirstName"></span> -->
      </div>

      <!-- lastname -->
      <div class="input">
          <label for="lastName">Last Name</label>
          <input type = "text" id="lastName" name="lastName" required
            value = "<?=isset($_POST['lastName']) ? htmlspecialchars($_POST['lastName']) : htmlspecialchars($user['lastName'])?>">
          <!-- <span class="error-message" id="errorLastName"></span> -->
      </div>

      <!-- street -->
      <div class="input">
          <label for="street">Street</label>
          <input type = "text" id="street" name="street" required
            value = "<?=isset($_POST['street']) ? htmlspecialchars($_POST['street']) : htmlspecialchars( $address['street'])?>">
          <!-- <span class="error-message" id="errorLastName"></span> -->
      </div>

      <!-- housenumber -->
      <div class="input">
          <label for="number">House Number</label>
          <input type = "text" id="number" name="number" required
            value = "<?=isset($_POST['number']) ? htmlspecialchars($_POST['number']) : htmlspecialchars( $address['number'])?>">
          <!-- <span class="error-message" id="errorNumber"></span> -->
      </div>

      <!-- city -->
      <div class="input">
          <label for="city">City</label>
          <input type = "text" id="city" name="city" required
            value = "<?=isset($_POST['city']) ? htmlspecialchars($_POST['city']) : htmlspecialchars( $address['city'])?>">
          <!-- <span class="error-message" id="errorCity"></span> -->
      </div>

      <!-- zip -->
      <div class="input">
          <label for="zip">ZIP</label>
          <input type = "text" id="zip" name="zip" required
            value = "<?=isset($_POST['zip']) ? htmlspecialchars($_POST['zip']) : htmlspecialchars( $address['zip'])?>">
          <!-- <span class="error-message" id="errorZIP"></span> -->
      </div>

      <!-- email -->
      <div class="input">
          <label for="email">E-Mail</label>
          <input type = "email" id="email" name="email"
            value = "<?=isset($_POST['email']) ? htmlspecialchars($_POST['email']) : htmlspecialchars($user['email'])?>">
          <!-- <span class="error-message" id="errorEmail"></span> -->
      </div>

      <br>
      <div>
          <button type="submit" name="updateAccountSubmit">Save Changes</button>
          <button type="reset">Reset Changes</button>
      </div>
  </form>
  <br>
  <div class="account-form table-container">
      <table class="table-confirm">
      <tr>
          <td><strong>Last Order:</strong></td>
          <td><?=isset($latestOrder['createdAt']) ? $latestOrder['createdAt'] : 'None'; ?></td>
        </tr>
        <tr>
          <td><strong>Account created</strong>:</td>
          <td><?=$user['createdAt']?></td>
        </tr>
        <tr>
          <td><strong>Last Update:</strong></td>
          <td><?=isset($user['updatedAt']) ? $user['updatedAt'] : 'None'; ?></td>
        </tr>
      </table>
  </div>
  <br>
  <div class="account-form">
      <a href="index.php?c=account&a=changePassword"><button>Change Password</button></a>
  </div>
  <br>
</section>