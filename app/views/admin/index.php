<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 11/09/2018
 * Time: 19:22
 */

//echo $data['result'] .'<br><br>';

if(isset($_COOKIE['login'])) {
    ?>
    <form action="utenti" method="post">
        <input type="submit" name="bottone" value="Utenti">
    </form>
    <form action="login/logout" method="post">
        <input type="submit" name="bottone" value="Logout">
    </form>
    <?php
}