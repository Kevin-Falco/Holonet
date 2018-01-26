<?php
require ('utils.inc.php');

session_start();

if($_GET['step'] == 'ERROR_EMAIL')
{
    $message_erreur = 'E-mail non valide. Réessayez. <br/>';
}
else
{
    $message_erreur = "";
}

require('../view/mdp_oublie.php');