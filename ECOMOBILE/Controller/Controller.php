<?php
require('Model/Model.php');



/*Function qui nous envoie sur la page de réservation des participants si la date est inférieur
à la date courante et que le nombre de partipant soit compris entre 1 et 5*/
function reservparticipe($nbparticipant){

    if(verifDate()) {
        if($nbparticipant <= 5 && $nbparticipant > 0) {
            $allvehicule = GetListVehicule($_SESSION['agence']);
            require('View/FormReservParticip.php');
        }
        else{
            echo "Le nombre de participant est invalide";
            require('View/FormReservation.php');
        }
    }
    else{
        echo "La date entrée n'es pas valide";
        require('View/FormReservation.php');
    }

}

/* Enregiste toutes les informations pour après les envoyer dans la base de donnée*/
function reservationAfterFormParticip($nomparticip,$prenomparticip,$forfait,$idvehicule){

    $idclient = SetClient($_SESSION['nomclient'],$_SESSION['prenomclient'],$_SESSION['emailclient'],$_SESSION['telclient']);

    $idlocation = SetLocation($_SESSION['datelocation'],$_SESSION['heurelocation'],$_SESSION['dureelocation'],$idclient);
    for ($i = 0; isset($nomparticip[$i]); $i++){
        SetParticipant($nomparticip[$i],$prenomparticip[$i],$forfait[$i],$idvehicule[$i],$idlocation);
        UpdateVehicule($idvehicule[$i]);
        echo $i;
    }
    $_SESSION['idlocation'] = $idlocation;

}

/* Fonction qui permet de vérifier la date pour savoir si elle est supérieur à la date courante*/
function verifDate(){
    $current_date = new DateTime();

    if($_SESSION['datelocation'] >= $current_date->format('Y-m-d')){
            return true;


    }
    return false;
}