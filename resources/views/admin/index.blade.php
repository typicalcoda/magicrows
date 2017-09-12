<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Kranjo - Admin </title>
	<link rel="stylesheet" href="/css/app.css">
	{{-- <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"> --}}
	<link href="/css/fs.css" rel="stylesheet">
	<link href="/css/sweetalert.min.css" rel="stylesheet">
	
</head>
<body>
	<div id="app">
		<side-bar></side-bar>
		<top-bar></top-bar>
		
		<div class="page-body">	
			<router-view></router-view>
		</div>
	</div>
	{{-- <script src="/js/vue.js"></script> --}}
	<script src="/js/sweetalert.min.js"></script>
	<script src="/js/app.js"></script>
</body>
</html>