<!doctype>
<html>
	<head>
		<title>RestIT - Errore</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Settaggi Sito Web -->
		<link rel="icon" href="" type="image/x-icon" />
		<meta name="theme-color" content="#222222" />
		
		<!-- Jquery -->
		<script src="vendor/jquery/jquery-3.3.1.min.js"></script>
		
		<!-- bootstrap -->
		<link rel="stylesheet" href="vendor\bootstrap\css\bootstrap.min.css">
		<script src="vendor\bootstrap\js\bootstrap.min.js"></script>
		
		<!-- Stili aggiuntivi -->
		<link rel="stylesheet" href="vendor\pyrohAndGemehStyle.css">
		<link rel="stylesheet" href="vendor\mainStyleRestIt.css">
	</head>
	<style>
	 body { height: 100%; width: 100%; padding: 8% 0%; }
	 .chromeStyleColumn { background-color: white; margin-bottom: 0px; border-radius: 10px; box-shadow: none; }
	
	body {
		background: #FDFC47;  /* fallback for old browsers */
		background: -webkit-linear-gradient(135deg, #32CD32, #FDFC47);  /* Chrome 10-25, Safari 5.1-6 */
		background: linear-gradient(135deg, #32CD32, #FDFC47); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
	}
	</style>
	
	<body>
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
							<input type="password" name="password" class="form-control chromeStyle" id="exampleInputPassword1" placeholder="Password">
						</div>
						<br>
						<button type="button" onclick="loginForm.submit();" class="btn btn-lg center-block borderBottom borderBottom-success">Accedi</button>
						<br>
					</form>
				</div>
				<br>
			</div>
		</div>
		
		
		
	</body>
</html>