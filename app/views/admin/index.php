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
			
				.calendarBox { 
					background-color : white; margin: 0px; min-height: 475px; padding: 2px 2px 10px 2px; border-radius: 0px;
				}
				.header { border-radius: 0px; }
				.calendarPlace { padding: 40px 0px; border-radius: 0px;}
			}
			@media (min-width: 768px)
			{
				.pannelloAdminHomepage { height: 100%; }
				.leftAdminHomepage { height: 100%; }
				.adminHomepage { height: calc(100% - 52px); }
				.calendarPlace { height: 100%; }
			
				.calendarBox { 
					background-color : white; margin: 40px 100px; min-height: 475px; padding: 5px 5px 20px 5px; border-radius: 25px;
				}
			
			}
			
			.header, .calendarPlace {
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
				
				<div class="col-md-7 calendarPlace">
					<div class="calendarBox">
						<?php
							require_once __DIR__ . '/../../class/calendar.php';
							$calendar = new Calendar();
							echo $calendar->show();
						?>
					</div>
						
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
						<div class="col-xs-2 col-md-6"><button type="button" class="btn btn-lg toolButton borderBottom borderBottom-warning"><span class="glyphicon glyphicon-gift" aria-hidden="true"></span><span class="textBorderBottom"> Festa</span></button></div>
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