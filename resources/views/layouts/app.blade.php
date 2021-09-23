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
	<script src="/js/bootstrap.min.js"></script>
	<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
	<script
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC23qYcKFicq421kbru-UPmyStlszzs3O4&callback=initMap&libraries=&v=weekly"
		async
	></script>
</body>
</html>