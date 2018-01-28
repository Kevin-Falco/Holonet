<?php
require ('trad.php');
require ('utils.inc.php');

session_start();

$message_erreur = "";
if (isset($_GET['step']))
{
    if ($_GET['step'] == 'ERROR_EMAIL')
    {
        $message_erreur = 'E-mail non valide. Réessayez. <br/>';
    }
}

require('../view/mdp_oublie.php');