<?php
/*Fonction qui nous connecte et relie à la bdd*/
function dbconnect()
{

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=ecomobil', 'root', '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        echo "Connection OK";
        echo "<br>";
        return $bdd;
    }
    catch (Exception $e){

        die('Erreur de connection à la base : ' . $e->getMessage());    /* die est un alias de la fonction exit */
    }

}

/*Ajout du client dans la table*/
function SetClient($nom,$prenom,$email,$tel){
    $bdd = dbconnect();
    $req = $bdd->prepare('insert into Client(Prenom, Nom, email,numero) Value(:prenom,:nom,:email,:tel);');
    $req->execute(array('nom' => $nom, 'prenom' =>$prenom, 'email' => $email, 'tel' => $tel));
    return $bdd->lastInsertId();
}

/*Récupere les véhicules disponible de la bdd par rapport à l'agence*/
function GetListVehicule($agence){
    $bdd = dbconnect();
    $req = $bdd->prepare('select * from vehicule v, typevehicule t where v.fk_IdTypevehicule = t.IDTypevehicule and v.statusvehicule = "disponible" and v.fk_agence = :agence;');
    $req->execute(array('agence' => $agence));
    return $req->fetchAll();
}

/*Ajout des informations de la location dans la table*/
function SetLocation($date,$heure,$duree,$idclient){
    $bdd = dbconnect();
    $req = $bdd->prepare('insert into location(date,heure,dureelocation,statuslocation,fk_idclient) value(:date,:heure,:duree,:status,:idclient);');
    $req->execute(array('date' => $date, 'heure' => $heure, 'duree' => $duree, 'status' => "en cours", 'idclient' => $idclient));
    return $bdd->lastInsertId();
}

/*Ajout des informations du/des participant(s) dans la table*/
function SetParticipant($nom,$prenom,$forfait,$idvehicle,$idlocation){
    $bdd = dbconnect();
    $req = $bdd->prepare('insert into participant(Prenom,nom,forfait,fk_idvehicule,fk_idnumerolocation) value(:prenom,:nom,:forfait,:idvehicule,:idlocation);');
    $req->execute(array('prenom' => $prenom, 'nom' =>$nom, 'forfait' => $forfait, 'idvehicule' => $idvehicle, 'idlocation' => $idlocation));
    return $bdd->lastInsertId();
}

function UpdateVehicule($idvehicule){
    $bdd = dbconnect();
    $req = $bdd->prepare('update vehicule set statusvehicule = :status where idvehicule = :idvehicule;');
    $req->execute(array('status' => 'réservé', 'idvehicule' => $idvehicule));
    return $bdd;
}
