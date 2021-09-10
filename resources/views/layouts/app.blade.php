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
</head>
<body>
	<x-navbar></x-navbar>
	{{ $slot }}
	<x-footer></x-footer>
	<script src="/js/bootstrap.min.js"></script>
</body>
</html>