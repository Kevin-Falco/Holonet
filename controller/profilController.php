<?php
    require ('utils.inc.php');

    session_start();

    if ($_GET['step'] == 'MODIF_MDP')
    {
        $message_erreur = 'Mot de passe modifié.';
    }
    else if($_GET['step'] == 'ERROR_VERIF')
    {
        $message_erreur = 'Mauvaise vérification du mot de passe. Réessayez.';
    }
    else if ($_GET['step'] == 'MDP_INCORRECT')
    {
        $message_erreur = 'Mot de passe incorrect, veuillez réessayer.';
    }
    else
    {
        $message_erreur = "";
    }

    require('../view/profil.php');
