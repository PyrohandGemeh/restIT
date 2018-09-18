<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 13/09/2018
 * Time: 14:40
 */

while($row = $data->fetch_assoc()) {
    echo "Eccolo" . "<br>";
    echo $row["id"] ." ". $row["nome_periodo"]. '<br>';
}
?>

<form action="<?php echo ROOT .'/periodifasce' ?>" method="post">
    <input type="submit" name="bottone" value="Home">
</form>

