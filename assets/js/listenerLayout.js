document.getElementById("searchClick").addEventListener('click', function() {
    var nav = document.getElementById('fullListMin');
    var searchFull = document.getElementById('searchMin');
    nav.style.display = "none";
    searchFull.style.display = "block";
});


document.getElementById('backToNav').addEventListener('click', function() {
    var nav = document.getElementById('fullListMin');
    var searchFull = document.getElementById('searchMin');
    nav.style.display = "block";
    searchFull.style.display = "none";
});

document.getElementById('mainSearch').addEventListener('focusin', (event) => {
    var element = document.getElementById('mainSearch');
    element.style.width = "300%";
    element.style.zIndex = "1000";
    element.style.border = "5px solid rgb(255, 87, 87)";
    document.getElementById('mainSearch').display = "block !important";
    document.getElementById('main').classList.add("milky");
});

document.getElementById('mainSearch').addEventListener('focusout', (event) => {
    var element = document.getElementById('mainSearch');
    element.style.width = "100%";
    element.style.border = "0";
    document.getElementById('mainSearch').display = "block";
    document.getElementById('main').classList.remove("milky");
});