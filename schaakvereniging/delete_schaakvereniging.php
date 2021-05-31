<?php


if(isset($_GET['schaakvereniging_verenigingID'])){

    include '../database.php';
    $db = new database();

    $sql = "DELETE FROM schaakvereniging WHERE verenigingID =:verenigingID ";

    $placeholders = [
        'verenigingID'=>$_GET['schaakvereniging_verenigingID']
    ];

    
    $db->update_or_delete($sql, $placeholders , 'schaakvereniging.php');
}

?>