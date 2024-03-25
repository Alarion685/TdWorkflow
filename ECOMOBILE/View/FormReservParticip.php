<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Réservation Participant</title>
    <link href="../Style/style.css" rel="stylesheet">
</head>



<body>
<p><a href="/ECOMOBILE/index.php">Retour à l'index </a></p>


<section id="s1">
<?php
if (isset($nbparticipant) && isset($allvehicule))
{
    for ($i = 1; $i <= $nbparticipant; $i++){

    echo "</br><label>Participant ". $i ." : </label>";
    ?>

    <form action="/ECOMOBILE/index.php?action=reservparticip" method="post">
        <p>Nom :<br><input type="text" name="nom[]"></p>
        <p>Prénom :<br><input type="text" name="prenom[]"></p>
        <p><select name="forfait[]">
            <option value="aucun">Aucun</option>
            <option value="etudiant">Etudiant</option>
            <option value="famille">Famille</option>
        </select></p>
        <p><select name="idvehicule[]">
            <option value="">Choisir un vehicule</option>

<?php


        foreach ($allvehicule as $unvehicule){
            $label = $unvehicule['Libelle']. " " . $unvehicule['couleur'] . " " . $unvehicule['fk_Agence'];
            echo "<option value=\"" . $unvehicule['IDvehicule'] . "\">" . $label . "</option>";

        }
        ?>
        </select></p>
        <br>
            <?php
    }
}



?>
        <br>
        <br>
        <input type="submit" value="Réservation">
    </form>
</section>
</body>
</html>