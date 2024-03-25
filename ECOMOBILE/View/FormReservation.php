<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Information Location</title>
    <link href="../Style/style.css" rel="stylesheet">
</head>



<body>
<HEADER id="h1"><h2>Formulaire de location</h2></HEADER>
<p><a href="../index.php">Retour à l'index </a></p>


<section id="s1">

    <div class="trait_dessus"><hr></div>
    <form  action="/ECOMOBILE/index.php?action=reservclient" method="post">
    <p>Nom :<br><input type="text" name="nom" placeholder="Entrer nom" size="25"></p>
    <p>Prénom :<br><input type="text" name="prenom" placeholder="Entrer prénom" size="25"></p>
    <p>Email :<br><input type="text" name="email" placeholder="Entrer Email" size="25"></p>
    <p>Numéro de téléphone :<br><input type="text" name="tel" placeholder="Entrer Téléphone" size="25"></p>
    <p>Nombre de personne :<br><input type="text" name="nbpersonne" placeholder="Entrer nombre personne" size="25"></p>
    <p>Durée :<br>
        <select name="duree" style="width:177px">
            <option value="1h">1 heure</option>
            <option value="2h">2 heures</option>
            <option value="3h">3 heures</option>
            <option value="1j">1 jour</option>
            <option value="2j">2 jours</option>
            <option value="3j">3 jours</option>
            <option value="4j">4 jours</option>
            <option value="5j">5 jours</option>
        </select>
    </p>
    <p>Date de Location :<br><input type="date" name="date" ></p>
    <p>Heure de location :<br><input type="time" name="heure"></p>
    <p>Agence :<br><input type="text" name="agence" placeholder="Entrer agence" size="25"></p>

    <input type="submit" value="Réservation">
</form>
</section>

<?php
if (isset($last_id))
{
    echo"insertion de client n°" . $last_id . " effectué";
}
?>

</body>
</html>