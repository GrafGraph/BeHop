document.getElementById("searchClick").addEventListener('click', function() {
    var nav = document.getElementById('fullListMin');
    var searchFull = document.getElementById('searchMin');
    nav.style.display = "none";
    searchFull.style.display = "block";
});
document.getElementById("searchClick2").addEventListener('click', function() {
    var nav = document.getElementById('fullListMin2');
    var searchFull = document.getElementById('searchMin2');
    nav.style.display = "none";
    searchFull.style.display = "block";
});

document.getElementById('backToNav').addEventListener('click', function() {
    var nav = document.getElementById('fullListMin');
    var searchFull = document.getElementById('searchMin');
    nav.style.display = "block";
    searchFull.style.display = "none";
});

document.getElementById('backToNav2').addEventListener('click', function() {
    var nav = document.getElementById('fullListMin2');
    var searchFull = document.getElementById('searchMin2');
    nav.style.display = "block";
    searchFull.style.display = "none";
});

document.getElementById('mainSearch').addEventListener('focusin', (event) => {
    document.getElementById('mainSearch').display = "block !important";
    document.getElementById('main').classList.add("milky");
});

document.getElementById('mainSearch').addEventListener('focusout', (event) => {
    document.getElementById('mainSearch').display = "block";
    document.getElementById('main').classList.remove("milky");
});
document.getElementById('mainSearch2').addEventListener('focusin', (event) => {
    document.getElementById('mainSearch2').display = "block !important";
    document.getElementById('main').classList.add("milky");
});

document.getElementById('mainSearch2').addEventListener('focusout', (event) => {
    document.getElementById('mainSearch2').display = "block";
    document.getElementById('main').classList.remove("milky");
});
document.getElementById('mainSearch3').addEventListener('focusin', (event) => {
    document.getElementById('mainSearch3').display = "block !important";
    document.getElementById('main').classList.add("milky");
});

document.getElementById('mainSearch3').addEventListener('focusout', (event) => {
    document.getElementById('mainSearch3').display = "block";
    document.getElementById('main').classList.remove("milky");
});
document.getElementById('searchClick').style.display = "block";