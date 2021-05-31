<?php


if(isset($_GET['toernooi_toernooiID'])){

    include '../database.php';
    $db = new database();
//Deze sql statement delete het toernooi
    $sql = "DELETE FROM toernooi WHERE toernooiID =:toernooiID ";

    $placeholders = [
        'toernooiID'=>$_GET['toernooi_toernooiID']
    ];

    //Deze functie zorgt ervoor dat je kan updaten of deleten
    $db->update_or_delete($sql, $placeholders , 'toernooi.php');
}

?>