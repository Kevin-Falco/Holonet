<?php
require('trad.php');
require('utils.inc.php');


$message_erreur = "";
if (isset($_GET['step'])) {
    if ($_GET['step'] == 'EMAIL_EXIST') {
        $message_erreur =  'Erreur, e-mail déjà utilisé.';
    } else if ($_GET['step'] == 'BAD_MDP') {
        $message_erreur = 'Mot de passes non identiques.';
    }
}


require($_SERVER['DOCUMENT_ROOT'] . '/view/inscription.php');