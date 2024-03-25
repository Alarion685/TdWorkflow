<?php

require_once '../Controller/Controller.php';

function testVerifDate()
{
    $_SESSION['datelocation'] = '2024-03-26';
    $result = verifDate();
    if ($result === true) {
        echo "La date au dessus passe (2024-03-26)\n";
    } else {
        echo "La date au dessus passe pas (PAS NORMAL) (2024-03-26)\n";
    }
    $_SESSION['datelocation'] = '2024-03-24';
    $result = verifDate();
    if ($result === true) {
        echo "La date en dessous passe (PAS NORMAL)(2024-03-24)\n";
    } else {
        echo "La date en dessous passe pas (2024-03-24)\n";
    }

    $_SESSION['datelocation'] = date('Y-m-d');
    $result = verifDate();
    if ($result === true) {
        echo "La date d'aujourd'hui passe(Y-m-d)\n";
    } else {
        echo "La date d'aujourd'hui passe passe pas (PAS NORMAL) (Y-m-d)\n";
    }

    unset($_SESSION['datelocation']);
    $result = verifDate();
    if ($result === true) {
        echo "La date sans chiffe passe (PAS NORMAL) ( )\n";
    } else {
        echo "La date sans chiffe passe pas ( )\n";
    }

    $_SESSION['datelocation'] = '2024-03-24223-1';
    $result = verifDate();
    if ($result === true) {
        echo "La date peut etre avec un autre format que Y-M-D (PAS NORMAL) (2024-03-24223-1) \n";
    } else {
        echo "La date ne peut pas etre avec un autre format que Y-M-D (2024-03-24223-1)\n";
    }


}

testVerifDate();