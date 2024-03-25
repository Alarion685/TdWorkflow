<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réservation</title>
    <link href="Style/style.css" rel="stylesheet">

</head>
<body>
<?php
require('Controller/Controller.php');

session_start();




if (isset($_GET['action'])) {
   if ($_GET['action'] == 'reservclient') {
       $_SESSION['nomclient'] = $_POST['nom'];
       $_SESSION['prenomclient'] = $_POST['prenom'];
       $_SESSION['emailclient'] = $_POST['email'];
       $_SESSION['telclient'] = $_POST['tel'];
       $_SESSION['nbpersonne'] = $_POST['nbpersonne'];
       $_SESSION['datelocation'] = $_POST['date'];
       $_SESSION['dureelocation'] = $_POST['duree'];
       $_SESSION['heurelocation'] = $_POST['heure'];
       $_SESSION['agence'] = $_POST['agence'];
       reservparticipe($_SESSION['nbpersonne']);
   }
   if($_GET['action'] == 'reservparticip') {
       reservationAfterFormParticip($_POST['nom'],$_POST['prenom'],$_POST['forfait'],$_POST['idvehicule']);
       require ('View/RecapitulatifReservation.php');
   }

    //Reservation($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['tel']);



 } else {
    require('MenuPrincipale.php');
}




/*?> ommis car PHP only */?>

</body>
</html>
