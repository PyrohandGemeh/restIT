<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 13/09/2018
 * Time: 14:40
 */

while($row = $data->fetch_assoc()) {
    echo "Eccolo" . "<br>";
    echo $row["username"] ." ". $row["password"]. '<br>';
}
?>

<form action="<?php echo ROOT .'/utenti' ?>" method="post">
    <input type="submit" name="bottone" value="Home">
</form>
