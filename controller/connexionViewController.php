<?php
require('../model/trad.php');
require('utils.inc.php');

if (isset($_GET['step'])) {
    if ($_GET['step'] == 'ERROR_MDP') {
        $message_erreur = 'Erreur de mot de passe.';
    } else if ($_GET['step'] == 'ERROR_EMAIL') {
        $message_erreur = 'Erreur, l\'e-mail n\'existe pas.';
    } else if ($_GET['step'] == 'VALIDATION') {
        $message_erreur = 'Erreur, e-mail non-validée.';
    }
}
else
{
    $message_erreur = '';
}

require("../view/connexion.php");