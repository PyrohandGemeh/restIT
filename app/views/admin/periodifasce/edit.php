<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 13/09/2018
 * Time: 14:40
 */


while($row = $data->fetch_assoc()) {
    //echo $data->num_rows;
    echo $row["nome_fascia"] .': ';?> <input type="text" name="orario" value=" <?php echo $row['orario'];?>"> <br>
    <?php

    echo '<br>';
}
?>

<form action="<?php echo ROOT .'/periodifasce' ?>" method="post">
    <input type="submit" name="bottone" value="Home">
</form>

