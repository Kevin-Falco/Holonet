<<<<<<< HEAD:php/controller/mail_mdpModelController.php
<?php
require('utils.inc.php');
require('../model/functions.php');
require('../model/mail_mdp.php');

session_start();

$a_z = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
$mdp = '0' . $a_z[mt_rand(0,51)] . mt_rand(0,9) . mt_rand(0,9) . $a_z[mt_rand(0,51)] . mt_rand(0,9) . mt_rand(0,9) . $a_z[mt_rand(0,51)] . mt_rand(0,9);
$email= $_POST['email'];

$dbRow = getUserDataByEmail($_POST['email']);

if(!isset($dbRow['email']))
{
    header('Location: mail_mdpController.php?step=ERROR_EMAIL');
    exit;
}

if(mdpChangement($email, md5($mdp)))
{
    $message = 'Voici votre nouveau mot de passe : ' . $mdp;
    mail($email, 'Mot de passe oublié', $message);
}
else
{
    header('Location: mail_mdpController.php?step=ERROR_UNDEF');
    exit;
}

require('connexionViewController.php');

=======
<?php
require('utils.inc.php');
require('../model/functions.php');
require('../model/mail_mdp.php');

session_start();

$a_z = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
$mdp = '0' . $a_z[mt_rand(0,51)] . mt_rand(0,9) . mt_rand(0,9) . $a_z[mt_rand(0,51)] . mt_rand(0,9) . mt_rand(0,9) . $a_z[mt_rand(0,51)] . mt_rand(0,9);
$email= $_POST['email'];

$dbRow = getUserDataByEmail($_POST['email']);

if(!isset($dbRow['email']))
{
    header('Location: mail_mdpController.php?step=ERROR_EMAIL');
    exit;
}

if(mdpChangement($email, md5($mdp)))
{
    $message = 'Voici votre nouveau mot de passe : ' . $mdp;
    mail($email, 'Mot de passe oublié', $message);
}
else
{
    header('Location: mail_mdpController.php?step=ERROR_UNDEF');
    exit;
}

require('connexionViewController.php');

>>>>>>> af6306039faca5663c5ddb3b2fe2c2deb26787bf:php/controller/mail_mdpModelController.php
