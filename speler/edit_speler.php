<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include '../database.php';
require_once('../header.php');
$db = new database();

if(isset($_GET['speler_spelerID'])){
    $db = new database();
    $speler = $db->select("SELECT * FROM speler WHERE spelerID = :spelerID", ['spelerID'=>$_GET['speler_spelerID']]);
    //print_r($speler);
}
    
// if(isset($_POST['submit'])){
if($_SERVER['REQUEST_METHOD'] == "POST"){
     //deze sql statement update de info in speler
    $sql = "UPDATE speler SET voornaam=:voornaam, tussenvoegsel=:tussenvoegsel, achternaam=:achternaam, neemtdeel=:neemtdeel WHERE spelerID=:spelerID";

    $placeholders = [
        'voornaam'=>$_POST['voornaam'],
        'tussenvoegsel'=>$_POST['tussenvoegsel'],
        'achternaam'=>$_POST['achternaam'],
        'neemtdeel'=>$_POST['neemtdeel'],
        'spelerID'=>$_POST['spelerID']
    ];

    //Deze functie zorgt ervoor dat je kan updaten of deleten
    $db->update_or_delete($sql, $placeholders, 'speler.php');

}
?>

<div class="container">
    <form action="edit_speler.php" method="POST">
        <div class="form-group">
            <input type="hidden" name="spelerID" value="<?php echo isset($_GET['speler_spelerID']) ? $_GET['speler_spelerID'] : '' ?>">
            <label for="voornaam">voornaam</label>
            <input type="text" class="form-control" name="voornaam" placeholder="voornaam" value="<?php echo isset($speler) ? $speler[0]['voornaam'] : ''?>">
            <br>
            <label for="tussenvoegsel">tussenvoegsel</label>
            <input type="text" class="form-control" name="tussenvoegsel" placeholder="tussenvoegsel" value="<?php echo isset($speler) ? $speler[0]['tussenvoegsel'] : ''?>">
            <br>
            <label for="achternaam">Achternaam</label>
            <input type="text" class="form-control" name="achternaam" placeholder="achternaam" value="<?php echo isset($speler) ? $speler[0]['achternaam'] : ''?>">
            <br>
            <label for="neemtdeel">neemtdeel</label>
            <input type="text" class="form-control" name="neemtdeel" placeholder="neemtdeel" value="<?php echo isset($speler) ? $speler[0]['neemtdeel'] : ''?>">
            <br>
            <input type="submit" class="btn btn-lg btn-success btn-block" value="Edit">
        </div>
    </form>
</div>  
</body>
</html>