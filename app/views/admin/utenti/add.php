<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 13/09/2018
 * Time: 14:40
 */

?>

<form action="<?php echo ROOT .'/utenti/add' ?>" method="post">
    <input type="text" name="username" placeholder="username">
    <input type="password" name="password" placeholder="password">
    <input type="submit" name="login" value="inserisci">
</form>

<a href="<?php echo ROOT .'/utenti' ?>">Home</a>
