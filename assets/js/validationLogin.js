// @author Anton Bespalov
var emailRegEx = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
var emailName2 = document.getElementById('email');
emailName2.addEventListener('focusout', function() {
    if (emailName2.value.match(emailRegEx)) {
        emailName2.style.borderColor = "green";
        document.getElementById('wrongEmail2').innerHTML = '';
        return;
    } else {
        emailName2.style.borderColor = "red";
        document.getElementById('wrongEmail2').innerHTML = 'Email is not correct and is required!';
        wrongEmail2.style.color = "red";
        return;
    }
});