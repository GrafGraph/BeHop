var nameRegEx = /^[A-Za-zßäöü]*$/;
var cityRegEx = /^[A-Za-z -]*$/;
var streetRegEx = /^[A-Za-zß -]*$/;
var numberRegEx = /^[1-9][0-9]*[a-z]?$/;
var zipRegEx = /^[0-9]*$/;
var emailRegEx = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

var firstName = document.getElementById('firstNameInput');
firstName.addEventListener('focusout', function() {
    if (firstName.value.match(nameRegEx)) {
        firstName.style.backgroundColor = "white";
        return;
    } else {
        firstName.style.backgroundColor = "red";
        return;
    }
});
var lastName = document.getElementById('lastNameInput');
lastName.addEventListener('focusout', function() {
    lastName.style.backgroundColor = "white";
    if (lastName.value.match(nameRegEx)) {
        lastName.style.backgroundColor = "white";
        return;
    } else {
        lastName.style.backgroundColor = "red";
        return;
    }
});
var streetName = document.getElementById('streetInput');
streetName.addEventListener('focusout', function() {
    streetName.style.backgroundColor = "white";
    if (streetName.value.match(streetRegEx)) {
        streetName.style.backgroundColor = "white";
        return;
    } else {
        streetName.style.backgroundColor = "red";
        return;
    }
});
var numberName = document.getElementById('numberInput');
numberName.addEventListener('focusout', function() {
    numberName.style.backgroundColor = "white";
    if (numberName.value.match(numberRegEx)) {
        numberName.style.backgroundColor = "white";
        return;
    } else {
        numberName.style.backgroundColor = "red";
        return;
    }
});
var cityName = document.getElementById('cityInput');
cityName.addEventListener('focusout', function() {
    cityName.style.backgroundColor = "white";
    if (cityName.value.match(cityRegEx)) {
        cityName.style.backgroundColor = "white";
        return;
    } else {
        cityName.style.backgroundColor = "red";
        return;
    }
});
var zipName = document.getElementById('zipInput');
zipName.addEventListener('focusout', function() {
    zipName.style.backgroundColor = "white";
    if (zipName.value.match(zipRegEx)) {
        zipName.style.backgroundColor = "white";
        return;
    } else {
        zipName.style.backgroundColor = "red";
        return;
    }
});
var emailName = document.getElementById('emailInput');
emailName.addEventListener('focusout', function() {
    emailName.style.backgroundColor = "white";
    if (emailName.value.match(emailRegEx)) {
        emailName.style.backgroundColor = "white";
        return;
    } else {
        emailName.style.backgroundColor = "red";
        return;
    }
});