<?php
require('../model/trad.php');
require('utils.inc.php');

if (isset($_GET['step'])) {
    if ($_GET['step'] == 'EMAIL_EXIST') {
        echo 'Erreur, e-mail déjà utilisé.';
    } else if ($_GET['step'] == 'BAD_MDP') {
        echo 'Mot de passes non identiques.';
    }
}
else
{
    $message_erreur = "";
}

require('../view/inscription.php');