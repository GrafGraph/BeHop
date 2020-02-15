
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
