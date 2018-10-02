<?php
/**
 * Created by PhpStorm.
 * User: Alessandra
 * Date: 13/09/2018
 * Time: 14:40
 */

?>
Esempio con aggiunta di un solo orario
<form action="<?php echo ROOT .'/periodifasce/add' ?>" method="post"><br>
    Nome periodo: <input type="text" name="nome_periodo" placeholder="Nome periodo"> <br><br>
    <?php
        while($row = $data->fetch_assoc()) {
            echo $row['nome_fascia'] . ' '. $row['id']; ?>: <input type="text" name="<?php echo $row['id']; ?>"/><br><br>
        <?php
        }
    ?>
    <input type="submit" name="submit" value="Inserisci">
</form>

<a href="<?php echo ROOT .'/periodifasce' ?>">Home</a>
