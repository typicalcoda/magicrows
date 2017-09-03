<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Kranjo - Admin </title>
	<link rel="stylesheet" href="/css/app.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
</head>
<body>
	<div id="app">
		<side-bar></side-bar>
		<top-bar></top-bar>
		
		<div class="page-body">	
			<router-view></router-view>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.3/vue.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
	<script src="/js/app.js"></script>
</body>
</html>