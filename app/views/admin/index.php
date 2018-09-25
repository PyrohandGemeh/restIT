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
    <?php
	include 'footer.php';
}
?>