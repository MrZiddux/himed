<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<title>Himed | {{ $title }}</title>
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/components.css">
	<link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" media="screen and (min-width: 576px)" href="smallscreen.css">
	<style type="text/css">
		/* Set the size of the div element that contains the map */
		#map {
			height: 400px;
			/* The height is 400 pixels */
			width: 100%;
			/* The width is the width of the web page */
		}
	</style>
	<script>
		// Initialize and add the map
		function initMap() {
			// The location of madtive
			const madtive = { lat: -6.7584199, lng: 107.0475548 };
			// The map, centered at madtive
			const map = new google.maps.Map(document.getElementById("map"), {
				zoom: 15,
				center: madtive,
			});
			// The marker, positioned at madtive
			const marker = new google.maps.Marker({
				position: madtive,
				map: map,
			});
		}
	</script>
</head>
<body>
	<x-navbar></x-navbar>
	{{ $slot }}
	<x-footer></x-footer>
	<script src="/vendors/jquery/jquery-3.6.0.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/vendors/momentjs/moment.min.js"></script>
	<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
	<script
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC23qYcKFicq421kbru-UPmyStlszzs3O4&callback=initMap&libraries=&v=weekly"
		async
	></script>
	<script>
		let offset = 8;
		let limit = 4;
		// let URL = '/api/article/'+ offset + '/' + limit ;
		document.addEventListener("DOMContentLoaded", () => {
			//set up the IntersectionObserver to load more images if the footer is visible.
			//URL - https://gist.githubusercontent.com/prof3ssorSt3v3/1944e7ba7ffb62fe771c51764f7977a4/raw/c58a342ab149fbbb9bb19c94e278d64702833270/infinite.json
			let options = {
				root: null,
				rootMargins: "0px",
				threshold: 0.5
			};
			const observer = new IntersectionObserver(handleIntersect, options);
			observer.observe(document.querySelector("footer"));
			//an initial load of some data
			// getData();
		});
		function handleIntersect(entries) {
			if (entries[0].isIntersecting) {
				console.warn("something is intersecting with the viewport");
				getData();
			}
		}
		function getData() {
			let main = document.querySelector("main");
			console.log("fetch some JSON data");
			fetch('/api/article/'+ offset + '/' + limit)
				.then(response => response.json())
				.then(data => {
						let item = data;
						let xml = ``;
						if(item) {
							item.forEach(item => {
								let tags = item.tags.split('|');
								xml += `
									<div class="col">
										<a href="/blogs/${item.slug}" class="text-decoration-none">
											<img src="/images/uploads/articles/${item.thumbnail}" alt="Populer Artikel Image" class="img-fluid">
											<p class="t-size-sm t-color-lightgray text-center mt-1 mb-0">- ${tags[0]} -</p>
											<h6 class="t-size t-semibold text-center">${item.title}</h6>
											<p class="t-size-sm t-color-lightgray text-center">${moment(item.created_at).format("DD MMMM YYYY")} |  ${item.author} </p>
										</a>
									</div>
							`;
							});
							$(document).ready(function() {
								offset += 4;
								$('#blog').append(xml);
							});
						}
				});
		}
	</script>
</body>
</html>