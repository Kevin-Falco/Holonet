<<<<<<< HEAD:php/controller/connexionViewController.php
<?php
require('trad.php');
require_once('utils.inc.php');

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

=======
<?php
require('trad.php');
require_once('utils.inc.php');

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

>>>>>>> af6306039faca5663c5ddb3b2fe2c2deb26787bf:php/controller/connexionViewController.php
require($_SERVER['DOCUMENT_ROOT'] . '/view/connexion.php');