<!doctype>
<html>
	<head>
		<title>RestIT - Login</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Settaggi Sito Web -->
		<link rel="icon" href="" type="image/x-icon" />
		<meta name="theme-color" content="#222222" />
		
		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
		
		<!-- Jquery -->
		<script src="<?php echo ROOT . "/public/vendor/jquery/jquery-3.3.1.min.js"; ?>"></script>
		
		<!-- bootstrap -->
		<link rel="stylesheet" href="<?php echo ROOT . "/public/vendor/bootstrap/css/bootstrap.min.css"; ?>">
		<script src="<?php echo ROOT . "/public/vendor/bootstrap/js/bootstrap.min.js"; ?>"></script>
		
		<!-- Stili aggiuntivi -->
		<link rel="stylesheet" href="<?php echo ROOT . "/public/vendor/pyrohAndGemehStyle.css"; ?>">
		<link rel="stylesheet" href="<?php echo ROOT . "/public/vendor/mainStyleRestIt.css"; ?>">
		
		<!-- Cookies -->
		
		<style>
		* { font-family: 'Titillium Web'; }
		</style>
	</head>
	<style>
	body { height: 100%; width: 100%; padding: 8% 0%; }
	.chromeStyleColumn { background-color: white; margin-bottom: 0px; border-radius: 10px; box-shadow: none; }
	
	body {
		background: #FDFC47;  /* fallback for old browsers */
		background: -webkit-linear-gradient(135deg, #32CD32, #FDFC47);  /* Chrome 10-25, Safari 5.1-6 */
		background: linear-gradient(135deg, #32CD32, #FDFC47); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
	}
	
	/*Cookie Consent Begin*/
	#cookieConsent {
		background-color: rgba(20,20,20,0.8);
		min-height: 26px;
		font-size: 14px;
		color: #ccc;
		line-height: 26px;
		padding: 8px 0 8px 30px;
		font-family: "Trebuchet MS",Helvetica,sans-serif;
		position: fixed;
		bottom: 0;
		left: 0;
		right: 0;
		display: none;
		z-index: 9999;
	}
	#cookieConsent a {
		color: #4B8EE7;
		text-decoration: none;
	}
	#closeCookieConsent {
		float: right;
		display: inline-block;
		cursor: pointer;
		height: 20px;
		width: 20px;
		margin: -15px 0 0 0;
		font-weight: bold;
	}
	#closeCookieConsent:hover {
		color: #FFF;
	}
	#cookieConsent a.cookieConsentOK {
		background-color: #F1D600;
		color: #000;
		display: inline-block;
		border-radius: 5px;
		padding: 0 20px;
		cursor: pointer;
		float: right;
		margin: 0 60px 0 10px;
	}
	#cookieConsent a.cookieConsentOK:hover {
		background-color: #E0C91F;
	}
	/*Cookie Consent End*/
	</style>
	
	<body>
		<div id="cookieConsent">
			<div id="closeCookieConsent">x</div>
			Questa applicazione Web utilizza Cookies. <a href="#" target="_blank">Maggiori informazioni</a>. <a class="cookieConsentOK">OK, ho capito</a>
		</div>
		<div class="container">
			
			<div class="row">
				<div class="col-md-4 col-md-offset-4 chromeStyleColumn">
					<form action="login/login" method="POST" id="loginForm">
						<br>
						<h2>RestIT</h2>
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" name="username" class="form-control chromeStyle" id="username" placeholder="Username">
						</div>
						
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" name="password" class="form-control chromeStyle" id="password" placeholder="Password">
						</div>
						<br>
						<button type="button" onclick="loginForm.submit();" class="btn btn-lg center-block borderBottom borderBottom-success">Accedi</button>
						<br>
					</form>
				</div>
				<br>
			</div>
		</div>

		<script>
			document.getElementById("username").addEventListener("keydown", function (e) { if(e.keyCode == 13) loginForm.submit(); });
			document.getElementById("password").addEventListener("keydown", function (e) { if(e.keyCode == 13) loginForm.submit(); });
		
			$(document).ready(function(){   
				setTimeout(function () {
					$("#cookieConsent").fadeIn(200);
				 }, 2000);
				$("#closeCookieConsent, .cookieConsentOK").click(function() {
					$("#cookieConsent").fadeOut(200);
				}); 
			}); 
		</script>
		
		
	</body>
</html>