<?php
    require('utils.inc.php');

    if ($_GET['step'] == 'EMAIL_EXIST')
    {
        $message_erreur = 'Erreur, e-mail déjà utilisé.';
    }
    else if($_GET['step'] == 'BAD_MDP')
    {
        $message_erreur =  'Mot de passes non identiques.';
    }
    else
    {
        $message_erreur = "";
    }

    require('../view/inscription.php');