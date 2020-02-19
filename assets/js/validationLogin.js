var emailRegEx = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
var emailName2 = document.getElementById('email');
emailName2.addEventListener('focusout', function() {
    emailName2.style.borderColor = "dimgray";
    if (emailName2.value.match(emailRegEx)) {
        emailName2.style.borderColor = "dimgray";
        return;
    } else {
        emailName2.style.borderColor = "red";
        alert('Email must contain a Domain!');
        return;
    }
});