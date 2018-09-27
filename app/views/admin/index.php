<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 11/09/2018
 * Time: 19:22
 */

//echo $data['result'] .'<br><br>';

if(isset($_COOKIE['login'])) {
    include 'menu.php';
	?>
		<title>RestIT - Pannello di controllo</title>
		<style>
			.adminHomepage { position: absolute; width: 100%; padding: 0px; }
			.pannelloAdminHomepage { box-shadow: none; }
			
			@media (max-width: 767px)
			{
				.leftAdminHomepage { display: none; }
				.toolButton { width: 100%; }
				.toolButtonSet { padding: 8px 15px 0px 15px; position: fixed; bottom: 0px; width: 100%; left: 0px; background-color: white; }
				.toolButtonSet div { padding: 3px; }
				.calendarBox { height: 600px; }
			}
			@media (min-width: 768px)
			{
				.pannelloAdminHomepage { height: 100%; }
				.leftAdminHomepage { height: 100%; }
				.calendarBox { height: 100%; }
				.adminHomepage { height: calc(100% - 52px); }
			}
			
			.calendarBox {
				background: #FDFC47;  /* fallback for old browsers */
				background: -webkit-linear-gradient(135deg, #32CD32, #FDFC47);  /* Chrome 10-25, Safari 5.1-6 */
				background: linear-gradient(135deg, #32CD32, #FDFC47); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
			}
			
			.counterList { padding: 0px 15px; }
			.counterListNoun:hover { background-color: rgb(232, 234, 237); }
			.counterListNoun, .counterListNumber { box-shadow: 2px 2px #ddd; color: #666; font-size: 18px; margin-bottom: 6px; height: 46px; line-height: 46px; }
			.counterListNoun { text-align: right; transition-duration: 0.2s; border-radius: 23px 0px 0px 23px; background-color: rgb(241, 243, 244); }
			.counterListNumber { border-radius: 0px 23px 23px 0px; }
			
			.chromeStyleDatePicker { border-radius: 17px; background-color: rgb(241, 243, 244); }
			.chromeStyleDatePicker:hover { background-color: rgb(232, 234, 237); }
		</style>
		<div class="container adminHomepage">
			<div class="row">
				
				<div class="col-md-1 leftAdminHomepage"></div>
				
				<div class="col-md-7 calendarBox">
				
					<?php
						include ROOT . '/public/vendor/calendar.php';
						$calendar = new Calendar();
						$calendar->show();
					?>
						
				</div> <!-- Calendario -->
				
				<div class="col-md-4 pannelloAdminHomepage chromeStyleColumn">
					<br>
					<div class="row counterList">
						<div class="col-xs-8 col-md-9 counterListNoun">Prenotati odierni</div><div class="col-xs-4 col-md-3 counterListNumber">7000</div>
						<div class="col-xs-8 col-md-9 counterListNoun">Prenotati Arrivati</div><div class="col-xs-4 col-md-3 counterListNumber">200</div>
						<div class="col-xs-8 col-md-9 counterListNoun">Prenotati Conclusi</div><div class="col-xs-4 col-md-3 counterListNumber">3000</div>
						<div class="col-xs-8 col-md-9 counterListNoun">Prenotati da revisionare</div><div class="col-xs-4 col-md-3 counterListNumber">7</div>
					</div>
					<hr>
					<br>
					<br>
					<br>
					<br>
					<hr>
					<div class="row toolButtonSet">
						<div class="col-xs-2 col-md-6"><button type="button" class="btn btn-lg toolButton borderBottom borderBottom-primary"><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span><span class="textBorderBottom"> Visuale</span></button></div>
						<div class="col-xs-2 col-md-6"><button type="button" class="btn btn-lg toolButton borderBottom borderBottom-success"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span><span class="textBorderBottom"> Prenotati</span></button></div>
						<div class="col-xs-2 col-md-6"><button type="button" class="btn btn-lg toolButton borderBottom borderBottom-warning"><span class="glyphicon glyphicon-gift" aria-hidden="true"></span><span class="textBorderBottom"> Prenota festa</span></button></div>
						<div class="col-xs-2 col-md-6"><button type="button" class="btn btn-lg toolButton borderBottom borderBottom-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><span class="textBorderBottom"> Revisioni</span></button></div>
						<div class="col-xs-2 col-md-6"><button type="button" class="btn btn-lg toolButton borderBottom borderBottom-info"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span><span class="textBorderBottom"> Guida</span></button></div>
						<div class="col-xs-2 col-md-6"><button type="button" class="btn btn-lg toolButton borderBottom borderBottom-default"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span><span class="textBorderBottom"> Opzioni</span></button></div>
					</div>
				
				</div>
			</div>
		</div>
	
	<?php
	include 'footer.php';
}
?>