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
<a href="<?php echo ROOT ?>">Home</a>
