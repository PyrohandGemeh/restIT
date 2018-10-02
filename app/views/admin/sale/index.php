<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 13/09/2018
 * Time: 14:40
 */

?>

<a href=<?php echo ROOT .'/sale/add' ?>>Aggiungi</a><br><br>

<?php
while($row = $data->fetch_assoc()) {
    echo $row["id"] .": ". $row["nome_sala"];
    ?>

    <a href=<?php echo ROOT . '/sale/edit/' . $row['id'] ?>>Edit</a>
    <a href=<?php echo ROOT . '/sale/remove/' . $row['id'] ?>>Delete</a>
    <br>
    <?php
}
?>

<a href="<?php echo ROOT ?>">Home</a>
