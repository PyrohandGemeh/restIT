<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 11/09/2018
 * Time: 19:22
 */

//echo $data['result'] .'<br><br>';

if(isset($_COOKIE['login'])) {
    echo 'sei dentro <br><br>';
    ?>
    <form action="login/logout" method="post">
        <input type="submit" name="bottone" value="Logout">
    </form>
    <?php
}
else
    echo 'hJASAHFJKajksfdA';