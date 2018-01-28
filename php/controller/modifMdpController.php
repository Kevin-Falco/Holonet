<?php
require('trad.php');
require('utils.inc.php');

session_start();
if (isset($_GET['step'])) {
    if ($_GET['step'] == 'ERROR_VERIF') {
        $message_erreur = 'Erreur dans les mots de passe, veuillez réessayer.';
    } else if ($_GET['step'] == 'ERROR_ANCIEN') {
        $message_erreur = 'Erreur, votre nouveau mot de passe ne peut pas être l\'ancien.';
    } else if ($_GET['step'] == 'MDP_INCORRECT') {
        $message_erreur = 'Erreur dans l\'ancien mot de passe, veuillez réessayer.';
    } else if ($_GET['step'] == 'ERROR_UNDEF') {
        $message_erreur = 'Erreur inconnue, veuillez réessayer. <br/>';
    }
}
else
{
    $message_erreur = "";
}

require('../view/modifMdp.php');