<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 10/09/2018
 * Time: 16:49
 */


if(isset($_SESSION['login']))
    echo 'settata index';
    ?>
    <form action="login/login" method="post" name="login">
        <input type="text" name="username" placeholder="username">
        <input type="password" name="password" placeholder="password">
        <input type="submit" name="login" value="Login">
    </form>