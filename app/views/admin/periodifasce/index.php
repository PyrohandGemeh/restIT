<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 13/09/2018
 * Time: 14:40
 */

?>
<a href=<?php echo ROOT .'/periodifasce/add' ?>>Aggiungi</a>
<br><br>


<?php
while($row = $data->fetch_assoc()) {
    echo $row["id"] .": ". $row["nome_periodo"];
    ?>
    <a href=<?php echo ROOT .'/periodifasce/edit/'. $row['id'] ?>>Edit</a>
    <a href=<?php echo ROOT .'/periodifasce/remove/'. $row['id'] ?>>Delete</a>
    <?php
    echo '<br>';
}
?>

<form action="<?php echo ROOT ?>" method="post">
    <input type="submit" name="bottone" value="Home">
</form>
