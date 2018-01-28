<?php
require('trad.php');
require ('utils.inc.php');

session_start();

$message_erreur = "";
if (isset($_GET['step'])) {
    if ($_GET['step'] == 'MODIF_MDP') {
        echo 'Mot de passe modifié.';
    } else if ($_GET['step'] == 'ERROR_VERIF') {
        echo 'Mauvaise vérification du mot de passe. Réessayez.';
    } else if ($_GET['step'] == 'MDP_INCORRECT') {
        echo 'Mot de passe incorrect, veuillez réessayer.';
    }
}

$lang = "";
if (isset($_SESSION['lang'])) {
        $lang = '?lang=' . $_SESSION['lang'];
    }

$gestion_utils = "";
if (isset($_SESSION['pseudo'])) {
    if ($_SESSION['categorie']=='admin') {
        $gestion_utils = '<form action="gestion_utilisateursModelController.php"> <input type="submit" value="Gestion utilisateurs"/></form><br/>';
    }
}


require('../view/profil.php');
