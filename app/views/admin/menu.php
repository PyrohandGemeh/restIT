<!doctype>
<html>
	<head>
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
			
			<style>
			* { font-family: 'Titillium Web'; }
			</style>
	</head>
	<body>
		<nav class="navbar navbar-inverse" style="border-radius: 0px; margin-bottom: 0px !important;">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
					<a class="navbar-brand" href="<?php echo ROOT; ?>">RestIT</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">Sale<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo ROOT; ?>">Aggiungi Sala</a></li>
								<li><a href="<?php echo ROOT . "/sale"; ?>">Elenca Sale</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">Prenotazioni<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo ROOT; ?>">Aggiungi prenotazione</a></li>
								<li><a href="<?php echo ROOT; ?>">Aggiungi festa</a></li>
								<li><a href="<?php echo ROOT . "/prenotazioni"; ?>">Elenca prenotati</a></li>
								<li><a href="<?php echo ROOT; ?>">Da revisionare</a></li>
								<li><a href="<?php echo ROOT; ?>">Storico</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">Stagioni<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo ROOT; ?>">Aggiungi stagione</a></li>
								<li><a href="<?php echo ROOT; ?>">Aggiungi giorno speciale</a></li>
								<li><a href="<?php echo ROOT . "/stagioni"; ?>">Elenca stagioni</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">Fasce<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo ROOT; ?>">Aggiungi fascia</a></li>
								<li><a href="<?php echo ROOT; ?>">Modifica fasce</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">Utenti<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo ROOT . "/utenti/add"; ?>">Aggiungi utente</a></li>
								<li><a href="<?php echo ROOT . "/utenti"; ?>">Elenca utenti</a></li>
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a class="nav-link" href="<?php echo "login/logout"; ?>"><span class="glyphicon glyphicon-user"></span> Bentornato <?php echo $_COOKIE['login']; ?>, Logout</a>
							
						</li>
					</ul>
				</div>
			</div>
		</nav>