<<<<<<< HEAD
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

=======
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

>>>>>>> af6306039faca5663c5ddb3b2fe2c2deb26787bf
require('../view/mdp_oublie.php');