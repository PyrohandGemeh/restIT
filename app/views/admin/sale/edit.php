<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 13/09/2018
 * Time: 14:40
 */

while($row = $data->fetch_assoc()) {
    echo "Eccolo" . "<br>";
    ?>
<form action="<?php echo ROOT .'/sale/edit/'. $row['id'] ?>" method="post">
<input type="text" name="nome" placeholder="Nome">
<input type="submit" name="bottone" value="Modifica">
</form>
    <?php
}
?>


