var nameRegEx = /^[A-Z][a-zßäöü]*$/;
var cityRegEx = /^[A-Z][a-z -]*$/;
var streetRegEx = /^[A-Za-zß -]+$/;
var numberRegEx = /^[1-9][0-9]*[a-z]?$/;
var zipRegEx = /^[0-9][0-9][0-9][0-9][0-9]$/;
var emailRegEx = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

var firstName = document.getElementById('firstNameInput');
firstName.addEventListener('focusout', function() {
    if (firstName.value.match(nameRegEx)) {
        firstName.style.borderColor = "green";
        return;
    } else {
        firstName.style.borderColor = "red";
        alert('First Name may only consist of Letters and is required!');
        return;
    }
});
var lastName = document.getElementById('lastNameInput');
lastName.addEventListener('focusout', function() {
    if (lastName.value.match(nameRegEx)) {
        lastName.style.borderColor = "green";
        return;
    } else {
        lastName.style.borderColor = "red";
        alert('Last Name may only consist of Letters and is required!');
        return;
    }
});
var streetName = document.getElementById('streetInput');
streetName.addEventListener('focusout', function() {
    if (streetName.value.match(streetRegEx)) {
        streetName.style.borderColor = "green";
        return;
    } else {
        streetName.style.borderColor = "red";
        alert('Street may only consist of Letters, Spaces and Hyphen and is required!');
        return;
    }
});
var numberName = document.getElementById('numberInput');
numberName.addEventListener('focusout', function() {
    if (numberName.value.match(numberRegEx)) {
        numberName.style.borderColor = "green";
        return;
    } else {
        numberName.style.borderColor = "red";
        alert('House Number may only consist  of Numbers and Letters (A Number must be first) and is required!');
        return;
    }
});
var cityName = document.getElementById('cityInput');
cityName.addEventListener('focusout', function() {
    if (cityName.value.match(cityRegEx)) {
        cityName.style.borderColor = "green";
        return;
    } else {
        cityName.style.borderColor = "red";
        alert('City may only consist of Letters, Spaces and Hypehen and is required!');
        return;
    }
});
var zipName = document.getElementById('zipInput');
zipName.addEventListener('focusout', function() {
    if (zipName.value.match(zipRegEx)) {
        zipName.style.borderColor = "green";
        return;
    } else {
        zipName.style.borderColor = "red";
        alert('ZIP may only consist of Numbers and is required!');
        return;
    }
});
var emailName = document.getElementById('emailInput');
emailName.addEventListener('focusout', function() {
    if (emailName.value.match(emailRegEx)) {
        emailName.style.borderColor = "green";
        return;
    } else {
        emailName.style.borderColor = "red";
        alert('Email must contain a Domain and is required!');
        return;
    }
});