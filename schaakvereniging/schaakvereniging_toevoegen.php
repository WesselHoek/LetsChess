<?php
//index.php

// include the database class
include "../database.php";

require_once('../header.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $fields = ['naam', 'telefoonnummer'];

    $error = false;

    foreach($fields as $field){
        if(!isset($_POST[$field]) || empty($_POST[$field])){
         $error = true;
    }
}

if(!$error){
    // store posted form values in variables
    $naam= $_POST['naam'];
    $telefoonnummer= $_POST['telefoonnummer'];



        
    $database = new database();
    //met deze functie voeg je een schaakvereniging toe
    $database->schaakvereniging_toevoegen($naam, $telefoonnummer);
 }
}
?>

<body>
<div class="container-fluid"><br>
        <div class="row">
            <div class="col-7">
                <img class="img-fluid blur" style="float: left;" src="../images/Chess.jpg" alt="speler">
            </div>

        <div class="col-3 ruimte border shadow p-3 mb-5 bg-white rounded registreer">
        
            <form class="form-signin" action="schaakvereniging_toevoegen.php" method="post">
            <h1 class="h3 mb-3 font-weight-normal">schaakvereniging Toevoegen</h1>

                <label for="naam">naam</label>
                <input type="text" name="naam" class="form-control" required="">
                <br>

                <label for="telefoonnummer">telefoonnummer</label>
                <input type="text" name="telefoonnummer" class="form-control" required="">
                <br>

                <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="submit">
            </form>
            <br>
            <button type="button" class="btn btn-primary btn-lg btn btn-light"><a href="speler.php">terug</a></button>
        </div>
    </div>
</div>  
</body>
