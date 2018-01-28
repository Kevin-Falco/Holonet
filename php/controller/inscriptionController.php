<<<<<<< HEAD
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


=======
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


>>>>>>> af6306039faca5663c5ddb3b2fe2c2deb26787bf
require($_SERVER['DOCUMENT_ROOT'] . '/view/inscription.php');