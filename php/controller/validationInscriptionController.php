<?php
require ('trad.php');
require_once('utils.inc.php');


$message_erreur = "";
if (isset($_GET['step']) && $_GET['step'] == 'ERROR')
{
    $message_erreur = 'Erreur de code';
}

require('../view/validationInscription.php');