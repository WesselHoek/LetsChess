<?php


if(isset($_GET['speler_spelerID'])){

    include '../database.php';
    $db = new database();
//Deze sql statement delete de speler
    $sql = "DELETE FROM speler WHERE spelerID =:spelerID ";

    $placeholders = [
        'spelerID'=>$_GET['speler_spelerID']
    ];

    //Deze functie zorgt ervoor dat je kan updaten of deleten
    $db->update_or_delete($sql, $placeholders , 'speler.php');
}

?>