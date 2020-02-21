var nameRegEx = /^[A-Za-zßäöü]+$/;
var cityRegEx = /^[A-Za-z -]+$/;
var streetRegEx = /^[A-Za-zß -]+$/;
var numberRegEx = /^[1-9][0-9]*[a-z]?$/;
var zipRegEx = /^[0-9][0-9][0-9][0-9][0-9]$/;
var emailRegEx = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

var firstName = document.getElementById('firstNameInput');
firstName.addEventListener('focusout', function() {
    if (firstName.value.match(nameRegEx)) {
        firstName.style.borderColor = "green";
        document.getElementById('wrongFirstName').innerHTML = '';
        return;
    } else {
        firstName.style.borderColor = "red";
        document.getElementById('wrongFirstName').innerHTML = 'First Name may only consist of Letters and is required!';
        wrongFirstName.style.color = "red";
        return;
    }
});
var lastName = document.getElementById('lastNameInput');
lastName.addEventListener('focusout', function() {
    if (lastName.value.match(nameRegEx)) {
        lastName.style.borderColor = "green";
        document.getElementById('wrongLastName').innerHTML = '';
        return;
    } else {
        lastName.style.borderColor = "red";
        document.getElementById('wrongLastName').innerHTML = 'Last Name may only consist of Letters and is required!';
        wrongLastName.style.color = "red";
        return;
    }
});
var streetName = document.getElementById('streetInput');
streetName.addEventListener('focusout', function() {
    if (streetName.value.match(streetRegEx)) {
        streetName.style.borderColor = "green";
        document.getElementById('wrongStreet').innerHTML = '';
        return;
    } else {
        streetName.style.borderColor = "red";
        document.getElementById('wrongStreet').innerHTML = 'Street may only consist of Letters, Spaces and Hyphen and is required!';
        wrongStreet.style.color = "red";
        return;
    }
});
var numberName = document.getElementById('numberInput');
numberName.addEventListener('focusout', function() {
    if (numberName.value.match(numberRegEx)) {
        numberName.style.borderColor = "green";
        document.getElementById('wrongNumber').innerHTML = '';
        return;
    } else {
        numberName.style.borderColor = "red";
        document.getElementById('wrongNumber').innerHTML = 'House Number may only consist  of Numbers and Letters (A Number must be first) and is required!';
        wrongNumber.style.color = "red";
        return;
    }
});
var cityName = document.getElementById('cityInput');
cityName.addEventListener('focusout', function() {
    if (cityName.value.match(cityRegEx)) {
        cityName.style.borderColor = "green";
        document.getElementById('wrongCity').innerHTML = '';
        return;
    } else {
        cityName.style.borderColor = "red";
        document.getElementById('wrongCity').innerHTML = 'City may only consist of Letters, Spaces and Hypehen and is required!';
        wrongCity.style.color = "red";
        return;
    }
});
var zipName = document.getElementById('zipInput');
zipName.addEventListener('focusout', function() {
    if (zipName.value.match(zipRegEx)) {
        zipName.style.borderColor = "green";
        document.getElementById('wrongZIP').innerHTML = '';
        return;
    } else {
        zipName.style.borderColor = "red";
        document.getElementById('wrongZIP').innerHTML = 'ZIP may only consist of Numbers and is required!';
        wrongZIP.style.color = "red";
        return;
    }
});
var emailName = document.getElementById('emailInput');
emailName.addEventListener('focusout', function() {
    if (emailName.value.match(emailRegEx)) {
        emailName.style.borderColor = "green";
        document.getElementById('wrongEmail').innerHTML = '';
        return;
    } else {
        emailName.style.borderColor = "red";
        document.getElementById('wrongEmail').innerHTML = 'Email is not correct!';
        wrongEmail.style.color = "red";
        return;
    }
});