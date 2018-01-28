<<<<<<< HEAD
<?php
require ('trad.php');
require_once('utils.inc.php');


$message_erreur = "";
if (isset($_GET['step']) && $_GET['step'] == 'ERROR')
{
    $message_erreur = 'Erreur de code';
}

=======
<?php
require ('trad.php');
require_once('utils.inc.php');


$message_erreur = "";
if (isset($_GET['step']) && $_GET['step'] == 'ERROR')
{
    $message_erreur = 'Erreur de code';
}

>>>>>>> af6306039faca5663c5ddb3b2fe2c2deb26787bf
require('../view/validationInscription.php');