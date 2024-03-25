<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Récapitulatif de la réservation</title>
    <link href="../Style/style.css" rel="stylesheet">
</head>
<p><a href="../index.php">Retour à l'index </a></p>
<?php
if (!isset($nbparticipant) && !isset($allvehicule))
{
    echo "Récapitulatif de la réservation";
    echo "</br>Il y a " . $_SESSION['nbpersonne'] . " participant";
    echo"</br> l'id de la location est " . $_SESSION['idlocation'];
}

?>
<body>
</body>
</html>