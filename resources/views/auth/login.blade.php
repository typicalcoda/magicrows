<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Kranjo - Login</title>
	<style>
		* {
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
		}
		body{
			background:#1b1b1b;
			margin:0; padding:0;
		}
		.box{
			position:relative;
			top:100px;
			width: 300px;
			margin: 0 auto;			
		}
		.logo{
			text-align:center;
		}
		.logo img{
			width: 49px;
			padding: 14px 0;
		}

		.form{
			background: #151414;
			padding: 60px 15px;
			margin-top: 40px;
		}
		.form label{
			display:block;
			color:#fff;
			padding-bottom:5px;
			font-family: Segoe Ui Light;
			font-size: 14px;
		}
		.form .input-group{
			padding-bottom:20px;
		}
		.form input{
			width:100%;
			border: 0 none;
			outline: 0;
			height: 35px;
			padding: 0 10px;
			background: #1f1f1f;
			color: #545454;
		}

		.form button{
			width: 100%;
			padding: 10px;
			outline: 0;
			text-transform: uppercase;
			font-family: Segoe Ui;
			font-size: 14px;
			background: #1a414a;
			border: 0;
			color: #bfbfbf;
			cursor:pointer;
			transition:.4s;
			margin-top:40px;
		}
		.form button:hover{
			background:#122d33;
		}
		input:-webkit-autofill {
			-webkit-box-shadow:0 0 0 50px #1f1f1f inset; 
			-webkit-text-fill-color: #545454;
		}

		input:-webkit-autofill:focus {
			-webkit-box-shadow:0 0 0 50px #1f1f1f inset; 
			-webkit-text-fill-color: #545454;
		} 
	</style>
</head>
<body>
	<div class="box">
		<div class="logo">
			<img src="/img/logo.png" alt="">
		</div>

		<div class="form">
			<form action="/login" method="post">
				{{ csrf_field() }}
				<div class="input-group">
					<label for="email">Email</label>
					<input id="email" name="email" type="text">
				</div>

				<div class="input-group">
					<label for="password">Password</label>
					<input id="password" name="password" type="password">
				</div>

				<button>Login</button>
			</form>
		</div>
	</div>
</body>
</html>