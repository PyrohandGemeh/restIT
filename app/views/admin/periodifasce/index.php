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
$i = 0;
while($row = $data->fetch_assoc()) {
    //echo $data->num_rows;
    echo $row["nome_periodo"] .': '. $row["nome_fascia"] .' '. $row['orario'];
    if($i == 0) {
        ?>
        <a href=<?php echo ROOT . '/periodifasce/edit/' . $row['id_periodo'] ?>>Edit</a>
        <a href=<?php echo ROOT . '/periodifasce/remove/' . $row['id_periodo'] ?>>Delete</a>
        <?php
        $i++;
    }
    else
        $i = 0;
    echo '<br>';
}
?>

<form action="<?php echo ROOT ?>" method="post">
    <input type="submit" name="bottone" value="Home">
</form>
