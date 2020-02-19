var nameRegEx = /^[A-Za-zßäöü]*$/;
var cityRegEx = /^[A-Za-z -]*$/;
var streetRegEx = /^[A-Za-zß -]*$/;
var numberRegEx = /^[1-9][0-9]*[a-z]?$/;
var zipRegEx = /^[0-9][0-9][0-9][0-9][0-9]$/;
var emailRegEx = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

var firstName = document.getElementById('firstNameInput');
firstName.addEventListener('focusout', function() {
    if (firstName.value.match(nameRegEx)) {
        firstName.style.borderColor = "dimgray";
        return;
    } else {
        firstName.style.borderColor = "red";
        alert('First Name may only consist of Letters');
        return;
    }
});
var lastName = document.getElementById('lastNameInput');
lastName.addEventListener('focusout', function() {
    lastName.style.borderColor = "dimgray";
    if (lastName.value.match(nameRegEx)) {
        lastName.style.borderColor = "dimgray";
        return;
    } else {
        lastName.style.borderColor = "red";
        alert('Last Name may only consist of Letters');
        return;
    }
});
var streetName = document.getElementById('streetInput');
streetName.addEventListener('focusout', function() {
    streetName.style.borderColor = "dimgray";
    if (streetName.value.match(streetRegEx)) {
        streetName.style.borderColor = "dimgray";
        return;
    } else {
        streetName.style.borderColor = "red";
        alert('Street may only consist of Letters, Spaces and Hyphen!');
        return;
    }
});
var numberName = document.getElementById('numberInput');
numberName.addEventListener('focusout', function() {
    numberName.style.borderColor = "dimgray";
    if (numberName.value.match(numberRegEx)) {
        numberName.style.borderColor = "dimgray";
        return;
    } else {
        numberName.style.borderColor = "red";
        alert('House Number may only consist  of Numbers and Letters (A Number must be first)!');
        return;
    }
});
var cityName = document.getElementById('cityInput');
cityName.addEventListener('focusout', function() {
    cityName.style.borderColor = "dimgray";
    if (cityName.value.match(cityRegEx)) {
        cityName.style.borderColor = "dimgray";
        return;
    } else {
        cityName.style.borderColor = "red";
        alert('City may only consist of Letters, Spaces and Hypehen!');
        return;
    }
});
var zipName = document.getElementById('zipInput');
zipName.addEventListener('focusout', function() {
    zipName.style.borderColor = "dimgray";
    if (zipName.value.match(zipRegEx)) {
        zipName.style.borderColor = "dimgray";
        return;
    } else {
        zipName.style.borderColor = "red";
        alert('ZIP may only consist of Numbers!');
        return;
    }
});
var emailName = document.getElementById('emailInput');
emailName.addEventListener('focusout', function() {
    emailName.style.borderColor = "dimgray";
    if (emailName.value.match(emailRegEx)) {
        emailName.style.borderColor = "dimgray";
        return;
    } else {
        emailName.style.borderColor = "red";
        alert('Email must contain a Domain!');
        return;
    }
});