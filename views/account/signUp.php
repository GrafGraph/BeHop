   <h1>Registration</h1>
<form method="POST">

   <fieldset>
 
   <legend>Personal data</legend>
   <?php if(!empty($errors)) : ?>
   <div class= "error">
      <?php foreach($errors as $error){echo $error."<br>";}?>
   </div>
   <?php endif; ?><br>
   <input type="text" id="firstNameInput" name="firstName" required value = "<?=isset($_POST['firstName']) ? $_POST['firstName'] : ''?>" placeholder="firstname"><br><br>
   <input type="text" id="lastNameInput" name="lastName" required value = "<?=isset($_POST['lastName']) ? $_POST['lastName'] : ''?>" placeholder="lastname"><br><br>
   
   <input type="text" id="streetInput" name="street" required value = "<?=isset($_POST['street']) ? $_POST['street'] : ''?>" placeholder="street"><br>
   <input type="text" id="numberInput" name="number" required value = "<?=isset($_POST['number']) ? $_POST['number'] : ''?>"placeholder="housnumber"><br>
   <input type="text" id="cityInput" name="city" required value = "<?=isset($_POST['city']) ? $_POST['city'] : ''?>" placeholder="city"><br>
   <input type="text" id="zipInput" name="zip" required  value = "<?=isset($_POST['zip']) ? $_POST['zip'] : ''?>" placeholder="ZIP"><br>
   
   </fieldset>

   <fieldset>
   <legend>Login data</legend>
   <input type="email"id="emailInput"  name="email" required value = "<?=isset($_POST['email']) ? $_POST['email'] : ''?>" placeholder="E-Mail"><br><br>
   <input type="password" name="password1"required placeholder =" password"><br><br>
   <input type="password" name="password2"required placeholder =" repeat the password"><br><br>
   </fieldset>
   <br>
   <button type="submit" name="submit">register</button>
   
   <!-- <script>
         var firstName = document.getElementById('firstNameInput');
         firstName.addEventListener('focusout', function(){
            firstName.style.backgroundColor = "white";               
            if(firstName.value.includes('1') || firstName.value.includes('2') || firstName.value.includes('3') || 
            firstName.value.includes('4') || firstName.value.includes('5') || firstName.value.includes('6') ||
            firstName.value.includes('7') || firstName.value.includes('8') || firstName.value.includes('9') || firstName.value.includes('0'))){
               firstName.style.backgroundColor = "red";
                  return;
               }
         });

         var laststName = document.getElementById('lastNameInput');
         lastName.addEventListener('focusout', function(){
            lastName.style.backgroundColor = "white";               
            if(lastName.value.includes('1') || lastName.value.includes('2') || lastName.value.includes('3') || 
            lastName.value.includes('4') || lastName.value.includes('5') || lastName.value.includes('6') ||
            lastName.value.includes('7') || lastName.value.includes('8') || lastName.value.includes('9') || lastName.value.includes('0'))){
               lastName.style.backgroundColor = "red";
                  return;
               }
         });

         var street = document.getElementById('streetInput');
         street.addEventListener('focusout', function(){
            street.style.backgroundColor = "white";               
            if(street.value.includes('1') || street.value.includes('2') || street.value.includes('3') || 
            street.value.includes('4') || street.value.includes('5') || street.value.includes('6') ||
            street.value.includes('7') || street.value.includes('8') || street.value.includes('9') || street.value.includes('0'))){
               street.style.backgroundColor = "red";
                  return;
               }
         });

         var number = document.getElementById('numberInput');
         number.addEventListener('focusout', function(){
            number.style.backgroundColor = "white";               
            if(){
               number.style.backgroundColor = "red";
                  return;
               }
         });

         var city = document.getElementById('cityInput');
         city.addEventListener('focusout', function(){
            city.style.backgroundColor = "white";               
            if(city.value.includes('1') || city.value.includes('2') || city.value.includes('3') || 
            city.value.includes('4') || city.value.includes('5') || city.value.includes('6') ||
            city.value.includes('7') || city.value.includes('8') || city.value.includes('9') || city.value.includes('0'))){
               city.style.backgroundColor = "red";
                  return;
               }
         });

         var zip = document.getElementById('zipInput');
         zip.addEventListener('focusout', function(){
            zip.style.backgroundColor = "white";               
            if(){
               zip.style.backgroundColor = "red";
                  return;
               }
         });

         var email = document.getElementById('emailInput');
         email.addEventListener('focusout', function(){
            email.style.backgroundColor = "white";               
            if(){
               email.style.backgroundColor = "red";
                  return;
               }
         });
   </script> -->