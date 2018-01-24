<?php
    require("../utils.inc.php");

    if ($_GET['step'] == 'ERROR_MDP')
    {
        $message_erreur = 'Erreur de mot de passe.';
    }
    else if ($_GET['step'] == 'ERROR_EMAIL')
    {
        $message_erreur = 'Erreur, l\'e-mail n\'existe pas.';
    }
    else
    {
        $message_erreur = "";
    }

    require("../view/connexion.php");