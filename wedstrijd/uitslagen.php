<?php
//index.php

// include the database class
include "../database.php";
require_once('../header.php');  

// start a new db connection
$db = new database();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>overzicht uitslagen</title>
</head>
<body>

<?php
//deze inner join statement select de dingen uit wedstrijd en speler
//concat zorgt ervoor dat speler.voornaam, ' ', speler.tussenvoegsel, ' ', speler.achternaam genoemd word naar speler1 of 2
    $uitslagen = $db->select("SELECT 
    wedstrijd.wedstrijdID,
    wedstrijd.ronde,
    CONCAT(speler.voornaam, ' ', speler.tussenvoegsel, ' ', speler.achternaam) as speler1,
    CONCAT(speler1.voornaam, ' ', speler1.tussenvoegsel, ' ', speler1.achternaam) as speler2, 
    wedstrijd.punten1,
    wedstrijd.punten2, 
    wedstrijd.winnaarID 
    FROM wedstrijd
    INNER JOIN speler speler
    ON speler.spelerID = wedstrijd.speler1ID
    INNER JOIN speler speler1
    ON speler1.spelerID = wedstrijd.speler2ID", []);
    // print_r($uitslagen);

    $columns = array_keys($uitslagen[0]);
    $row_data = array_values($uitslagen);
    
?>
<div class="container"><br>
    <div class="row">
        <div class="col-1">
            <button type="button" class="btn btn-primary btn-lg btn btn-light"><a href="../index.php">terug</a></button>
        </div>
        <div class="col-1"></div>
        <div class="col-2">
            <table class="table table-hover">
                <tr>
                    <?php

                        foreach($columns as $column){ 
                            echo "<th><strong> $column </strong></th>";
                        }

                    ?>
                </tr>

                <?php
                    foreach($row_data as $rows){ ?>
                    <tr>
                    <?php
                    foreach($rows as $data){
                        echo "<td> $data </td>";
                    }
                    ?>
                        <td>
                            <a type="button" class="btn btn-success" href="edit_wedstrijd.php?wedstrijd_wedstrijdID=<?php echo $rows['wedstrijdID']?>"><i class="fa fa-pencil"></i> Edit</a>
                        </td>
                    </tr>
                <?php } ?>
                    </tr>

            </table>
        </div>
</div>

    
</body>
</html>
