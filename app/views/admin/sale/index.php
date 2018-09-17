<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 13/09/2018
 * Time: 14:40
 */

while($row = $data->fetch_assoc()) {
    echo $row["id"] .": ". $row["nome_sala"] ." <br>";
}
?>

<form action="<?php echo ROOT ?>" method="post">
    <input type="submit" name="bottone" value="Home">
</form>
